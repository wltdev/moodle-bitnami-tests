<?php
defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");

class local_quizservice_external extends external_api
{

    public static function get_quiz_questions($quizid)
    {
        global $DB;

        $params = self::validate_parameters(
            self::get_quiz_questions_parameters(),
            array('quizid' => $quizid)
        );

        $quiz = $DB->get_record('quiz', array('id' => $params['quizid']), '*', MUST_EXIST);
        $questions = [];

        // Fetch questions from the quiz
        $slots = $DB->get_records('quiz_slots', array('quizid' => $params['quizid']));

        foreach ($slots as $slot) {
            $question = $DB->get_record('question', array('id' => $slot->questionid));
            $questions[] = [
                'id' => $question->id,
                'questiontext' => $question->questiontext,
                'answers' => $DB->get_records_menu('question_answers', array('question' => $question->id), '', 'id, answer')
            ];
        }

        return $questions;
    }

    public static function get_quiz_questions_parameters()
    {
        return new external_function_parameters(
            array('quizid' => new external_value(PARAM_INT, 'The ID of the quiz'))
        );
    }

    public static function get_quiz_questions_returns()
    {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'id' => new external_value(PARAM_INT, 'Question ID'),
                    'questiontext' => new external_value(PARAM_RAW, 'Question text'),
                    'answers' => new external_multiple_structure(
                        new external_single_structure(
                            array(
                                'id' => new external_value(PARAM_INT, 'Answer ID'),
                                'answer' => new external_value(PARAM_RAW, 'Answer text')
                            )
                        )
                    )
                )
            )
        );
    }
}
