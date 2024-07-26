<?php

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");
require_once("$CFG->dirroot/mod/quiz/locallib.php");

class local_quizjsonservice_external extends external_api
{

    public static function get_attempt_data($attemptid)
    {
        global $DB, $USER;

        $params = self::validate_parameters(self::get_attempt_data_parameters(), array('attemptid' => $attemptid));

        // Retrieve the quiz attempt and quiz details
        $attempt = $DB->get_record('quiz_attempts', array('id' => $params['attemptid']), '*', MUST_EXIST);
        $quiz = $DB->get_record('quiz', array('id' => $attempt->quiz), '*', MUST_EXIST);
        $cm = get_coursemodule_from_instance('quiz', $quiz->id, $quiz->course, false, MUST_EXIST);

        // Validate context
        $context = context_module::instance($cm->id);
        self::validate_context($context);
        // Check user capability
        require_capability('mod/quiz:reviewmyattempts', $context);

        // Load attempt data
        $attemptobj = quiz_attempt::create($attempt->id);

        $questions = array();
        $correct_answers_count = 0;
        $incorrect_answers_count = 0;
        $total_questions = 0;

        // Get all slots in the order they were created
        $slots = $attemptobj->get_slots();

        // Fetch questions in the order of their slots
        foreach ($slots as $slot) {
            $question_attempt = $attemptobj->get_question_attempt($slot);

            // print_r('dbid: ' . $question_attempt->get_database_id());
            // print_r('usageid: ' . $question_attempt->get_usage_id());
            // print_r(get_class_methods($question_attempt));
            // exit;

            $question = $question_attempt->get_question();

            // Get the question summary from the question_attempts table
            $questionsummary = $DB->get_field('question_attempts', 'questionsummary', array('id' => $question_attempt->get_database_id()));

            // Extract the order of answers from the questionsummary
            $summary_lines = explode("\n", $questionsummary);
            array_shift($summary_lines); // Remove the first line (question text)

            $orderData = [];
            foreach ($summary_lines as $line) {
                $orderData[] = trim(substr($line, 2)); // Remove ": " prefix and trim
            }

            // Prepare answers
            $answers = [];
            $rightanswerid = null;
            foreach ($question->answers as $choice => $answer) {
                if ($answer->fraction > 0) {
                    $rightanswerid = $answer->id; // This assumes the correct answer has a positive fraction.
                }

                $answers[] = array(
                    'id' => $answer->id,
                    'answer' => strip_tags(format_text($answer->answer, FORMAT_MOODLE)),
                    'fraction' => $answer->fraction,
                    'feedback' => strip_tags(format_text($answer->feedback, FORMAT_MOODLE)),
                );
            }

            // Reorder answers based on the order extracted from questionsummary
            $ordered_answers = [];
            $index = 0;
            foreach ($orderData as $response) {
                foreach ($answers as $answer) {
                    if ($answer['answer'] === $response) {
                        $answer['choice'] = $index;
                        $index++;
                        $ordered_answers[] = $answer;
                        break;
                    }
                }
            }

            $user_responses = $question_attempt->get_response_summary();

            $is_correct = $question_attempt->get_fraction() > 0;

            // Get latest user response when attempt is not yet completed
            if (!$user_responses) {

                $question_attempt_id = $question_attempt->get_database_id();

                $sql = "
                    SELECT qasd.*
                    FROM {question_attempt_step_data} qasd
                    JOIN {question_attempt_steps} qas ON qas.id = qasd.attemptstepid
                    WHERE qas.questionattemptid = :questionattemptid
                    AND qasd.name = 'answer'
                    ORDER BY qas.sequencenumber DESC
                    LIMIT 1
                ";

                $params = array('questionattemptid' => $question_attempt_id);
                $latest_step_data = $DB->get_record_sql($sql, $params);


                if ($latest_step_data) {
                    foreach ($ordered_answers as $answer) {
                        if ($answer['choice'] == $latest_step_data->value) {
                            $user_responses = strip_tags(format_text($answer['answer']));
                            $is_correct = $answer['fraction'] > 0;

                            break;
                        }
                    }
                }
            }

            if ($is_correct) {
                $correct_answers_count++;
            } else {
                $incorrect_answers_count++;
            }

            $total_questions++;

            $questiontextUrls = file_rewrite_pluginfile_urls($question->questiontext, 'pluginfile.php', $question->contextid, 'question', 'questiontext', $question->id);
            preg_match_all('/<img[^>]+src="([^">]+)"/i', $questiontextUrls, $imageMatches);

            $imageUrl = null;

            if (!empty($imageMatches[1]) && isset($imageMatches[1][0])) {
                // Check if the URL starts with @@PLUGINFILE@@
                // Check if the URL starts with @@PLUGINFILE@@
                if (strpos($imageMatches[1][0], '@@PLUGINFILE@@') === 0) {
                    // Replace @@PLUGINFILE@@ with the correct path
                    $imageUrl = str_replace('@@PLUGINFILE@@', $CFG->wwwroot . '/pluginfile.php', $imageMatches[1][0]);

                    // Ensure the URL includes the correct context and item ID
                    $contextid = $question->contextid; // Adjust based on the context ID
                    $itemid = $question->id; // Adjust based on the item ID

                    // Construct the final URL
                    $imageUrl = $CFG->wwwroot . '/pluginfile.php/' . $contextid . '/question/questiontext/' . $itemid . '/1' . $imageUrl;
                } elseif (strpos($imageMatches[1][0], 'http') === 0) {
                    // If URL is relative, prepend the Moodle root URL
                    $imageUrl = ltrim($imageMatches[1][0], '/');
                }
            }

            $questiontext = strip_tags(format_text($question->questiontext, $question->questiontextformat));

            if ($imageUrl) {
                $questiontext .= "{image:{$imageUrl}}";
            }

            $questions[] = array(
                'slot' => $slot,
                'questionid' => $question->id,
                'questiontext' => $questiontext,
                'answers' => $ordered_answers,
                'summary' => $questionsummary,
                'generalfeedback' => strip_tags(format_text($question->generalfeedback, FORMAT_MOODLE)),
                'rightanswerid' => $rightanswerid,
                'rightanswer' => strip_tags(format_text($question_attempt->get_right_answer_summary())),
                'user_responses' => $user_responses,
                'is_correct' => $is_correct
            );
        }

        $percentage_correct = ($total_questions > 0) ? ($correct_answers_count / $total_questions) * 100 : 0;

        $data = array(
            'attempt' => array(
                'attemptid' => $attempt->id,
                'userid' => $attempt->userid,
                'quiz' => $attempt->quiz,
                'attempt' => $attempt->attempt,
                'uniqueid' => $attempt->uniqueid,
                'layout' => $attempt->layout,
                'currentpage' => $attempt->currentpage,
                'preview' => $attempt->preview,
                'state' => $attempt->state,
                'timestart' => $attempt->timestart,
                'timefinish' => $attempt->timefinish,
                'timemodified' => $attempt->timemodified,
                'timemodifiedoffline' => $attempt->timemodifiedoffline,
                'timecheckstate' => $attempt->timecheckstate,
                'sumgrades' => $attempt->sumgrades,
                'questions' => $questions,
                'total_questions' => $total_questions,
                'correct_answers_count' => $correct_answers_count,
                'incorrect_answers_count' => $incorrect_answers_count,
                'percentage_correct' => $percentage_correct
            ),
        );

        return $data;
    }



    public static function get_attempt_data_parameters()
    {
        return new external_function_parameters(
            array('attemptid' => new external_value(PARAM_INT, 'The ID of the quiz attempt'))
        );
    }

    public static function get_attempt_data_returns()
    {
        return new external_single_structure(
            array(
                'attempt' => new external_single_structure(
                    array(
                        'attemptid' => new external_value(PARAM_INT, 'Attempt ID'),
                        'userid' => new external_value(PARAM_INT, 'User ID'),
                        'quiz' => new external_value(PARAM_INT, 'Quiz ID'),
                        'attempt' => new external_value(PARAM_INT, 'Attempt number'),
                        'uniqueid' => new external_value(PARAM_INT, 'Unique attempt ID'),
                        'layout' => new external_value(PARAM_RAW, 'Layout'),
                        'currentpage' => new external_value(PARAM_INT, 'Current page'),
                        'preview' => new external_value(PARAM_BOOL, 'Preview mode'),
                        'state' => new external_value(PARAM_ALPHA, 'State'),
                        'timestart' => new external_value(PARAM_INT, 'Time started'),
                        'timefinish' => new external_value(PARAM_INT, 'Time finished'),
                        'timemodified' => new external_value(PARAM_INT, 'Time modified'),
                        'timemodifiedoffline' => new external_value(PARAM_INT, 'Time modified offline'),
                        'timecheckstate' => new external_value(PARAM_INT, 'Time check state'),
                        'sumgrades' => new external_value(PARAM_FLOAT, 'Sum of grades achieved'),
                        'questions' => new external_multiple_structure(
                            new external_single_structure(
                                array(
                                    'slot' => new external_value(PARAM_INT, 'Slot number'),
                                    'questionid' => new external_value(PARAM_INT, 'Question ID'),
                                    'questiontext' => new external_value(PARAM_RAW, 'Question text'),
                                    'summary' => new external_value(PARAM_RAW, 'Question summary'),
                                    'generalfeedback' => new external_value(PARAM_RAW, 'General feedback'),
                                    'answers' => new external_multiple_structure(
                                        new external_single_structure(
                                            array(
                                                'choice' => new external_value(PARAM_INT, 'Answer choice'),
                                                'id' => new external_value(PARAM_INT, 'Answer ID'),
                                                'answer' => new external_value(PARAM_RAW, 'Answer text'),
                                                'fraction' => new external_value(PARAM_FLOAT, 'Answer fraction (score)'),
                                                'feedback' => new external_value(PARAM_RAW, 'Feedback text'),
                                            )
                                        )
                                    ),
                                    'rightanswerid' => new external_value(PARAM_INT, 'Right answer ID', VALUE_OPTIONAL),
                                    'rightanswer' => new external_value(PARAM_RAW, 'Right answer summary'),
                                    'user_responses' => new external_value(PARAM_RAW, 'User responses'),
                                    'is_correct' => new external_value(PARAM_BOOL, 'Is correct'),
                                    // 'user_responses' => $user_responses,
                                    // 'is_correct' => $is_correct
                                )
                            )
                        ),
                        'total_questions' => new external_value(PARAM_INT, 'Total number of questions'),
                        'correct_answers_count' => new external_value(PARAM_INT, 'Number of correct answers'),
                        'incorrect_answers_count' => new external_value(PARAM_INT, 'Number of incorrect answers'),
                        'percentage_correct' => new external_value(PARAM_FLOAT, 'Percentage correct'),
                    ),
                ),
            )
        );
    }
}
