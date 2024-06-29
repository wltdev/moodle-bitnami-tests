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
        // Get all slots in the order they were created
        $slots = $attemptobj->get_slots();

        // Fetch questions in the order of their slots
        foreach ($slots as $slot) {
            $question_attempt = $attemptobj->get_question_attempt($slot);
            $summary = $question_attempt->get_response_summary();
            $question = $question_attempt->get_question();
            // Obter o resumo das respostas


            // Prepare and shuffle answers
            $answers = [];
            $rightanswerid = null;
            foreach ($question->answers as $choice => $answer) {
                if ($answer->fraction > 0) {
                    $rightanswerid = $answer->id; // This assumes the correct answer has a positive fraction.
                }

                $answers[] = array(
                    'choice' => $choice,
                    'id' => $answer->id,
                    'answer' => strip_tags(format_text($answer->answer, FORMAT_MOODLE)),
                    'fraction' => $answer->fraction,
                    'feedback' => strip_tags(format_text($answer->feedback, FORMAT_MOODLE)),
                );
            }

            $questions[] = array(
                'slot' => $slot,
                'questionid' => $question->id,
                'questiontext' => strip_tags(format_text($question->questiontext, $question->questiontextformat)),
                'answers' => $answers,
                'summary' => $summary,
                'rightanswerid' => $rightanswerid,
                'rightanswer' => strip_tags(format_text($question_attempt->get_right_answer_summary())),
            );
        }

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
                'questions' => $questions
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
                                )
                            )
                        )
                    ),
                ),
            )
        );
    }
}
