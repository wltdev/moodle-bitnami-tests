<?php

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");
require_once("$CFG->dirroot/mod/quiz/locallib.php");

class local_quizchecker_external extends external_api
{

    public static function get_user_quizzes_parameters()
    {
        return new external_function_parameters(
            array(
                'courseid' => new external_value(PARAM_INT, 'The ID of the course'),
                'userid' => new external_value(PARAM_INT, 'The ID of the user')
            )
        );
    }

    public static function get_user_quizzes($courseid, $userid)
    {
        global $DB;

        // Parameter validation
        $params = self::validate_parameters(self::get_user_quizzes_parameters(), array('courseid' => $courseid, 'userid' => $userid));

        // Validate context
        $context = context_course::instance($params['courseid']);
        self::validate_context($context);

        // Check user capability
        require_capability('mod/quiz:view', $context);

        // Retrieve quizzes in the course
        $quizzes = $DB->get_records('quiz', array('course' => $params['courseid']));

        $result = array();
        foreach ($quizzes as $quiz) {
            // Retrieve attempts for this quiz by the user
            // $attempts = $DB->get_records('quiz_attempts', array('quiz' => $quiz->id, 'userid' => $params['userid']));
            $attempts = $DB->get_records_sql("SELECT * FROM {quiz_attempts} WHERE quiz = :quizid AND userid = :userid ORDER BY timestart DESC LIMIT 2", ['quizid' => $quiz->id, 'userid' => $params['userid']]);
            $attempts_data = array();

            foreach ($attempts as $attempt) {
                $attempts_data[] = array(
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
                );
            }

            // Retrieve the number of questions in the quiz
            $questions_count = $DB->count_records('quiz_slots', array('quizid' => $quiz->id));

            $result[] = array(
                'quizid' => $quiz->id,
                'quizname' => $quiz->name,
                'has_started' => !empty($attempts),
                'attempts' => $attempts_data,
                'questions_count' => $questions_count
            );
        }

        return $result;
    }

    public static function get_user_quizzes_returns()
    {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'quizid' => new external_value(PARAM_INT, 'Quiz ID'),
                    'quizname' => new external_value(PARAM_TEXT, 'Quiz name'),
                    'has_started' => new external_value(PARAM_BOOL, 'Whether the user has started the quiz'),
                    'attempts' => new external_multiple_structure(
                        new external_single_structure(
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
                            )
                        )
                    ),
                    'questions_count' => new external_value(PARAM_INT, 'Number of questions in the quiz'),
                )
            )
        );
    }
}
