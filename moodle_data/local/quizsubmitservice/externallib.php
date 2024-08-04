<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . "/externallib.php");
require_once($CFG->dirroot . '/mod/quiz/locallib.php');
require_once($CFG->dirroot . '/mod/quiz/attemptlib.php');
require_once($CFG->dirroot . '/question/engine/lib.php');

class local_quizsubmit_external extends external_api
{
    public static function process_attempt_parameters()
    {
        return new external_function_parameters(
            array(
                'attemptid' => new external_value(PARAM_INT, 'ID da tentativa'),
                'tofinish' => new external_value(PARAM_BOOL, 'Se a tentativa deve ser finalizada', VALUE_OPTIONAL, false),
                'responses' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'questionid' => new external_value(PARAM_INT, 'ID da questão'),
                            'response' => new external_value(PARAM_RAW, 'Resposta do usuário'),
                            'slot' => new external_value(PARAM_INT, 'Slot da questão')
                        )
                    ),
                    'Respostas do usuário',
                    VALUE_OPTIONAL,
                    []
                )
            )
        );
    }

    public static function process_attempt($attemptid, $tofinish = false, $responses = array())
    {
        global $DB, $USER;

        // Debugging output
        debugging("process_attempt called with attemptid: $attemptid, tofinish: $tofinish, responses: " . json_encode($responses));

        // Validate parameters
        $params = self::validate_parameters(self::process_attempt_parameters(), array(
            'attemptid' => $attemptid,
            'tofinish' => $tofinish,
            'responses' => $responses
        ));

        // More debugging output
        debugging("Validated parameters: " . json_encode($params));

        // Verifica se o parâmetro 'tofinish' está presente. Se não estiver, define-o como false.
        if (!isset($params['tofinish'])) {
            $params['tofinish'] = false;
        }

        // Initialize an array to collect errors
        $errors = array();

        try {
            // Check if the attempt exists
            if (!$DB->record_exists('quiz_attempts', array('id' => $params['attemptid']))) {
                throw new moodle_exception('attemptnotfound', 'local_storequizresponses', '', $params['attemptid']);
            }

            // Start transaction
            $transaction = $DB->start_delegated_transaction();

            foreach ($params['responses'] as $response) {
                try {
                    // Check if the question exists
                    if (!$DB->record_exists('question', array('id' => $response['questionid']))) {
                        $errors[] = "Question with ID {$response['questionid']} not found.";
                        continue;
                    }

                    // Fetch the question attempt
                    $question_attempt = $DB->get_record('question_attempts', array('questionusageid' => $params['attemptid'], 'slot' => $response['slot']), '*', IGNORE_MULTIPLE);

                    // Fetch the latest step of the question attempt
                    $latest_step = $DB->get_record_sql(
                        '
                        SELECT *
                        FROM {question_attempt_steps}
                        WHERE questionattemptid = :questionattemptid AND userid = :userid
                        ORDER BY sequencenumber DESC
                        LIMIT 1',
                        array('questionattemptid' => $question_attempt->id, 'userid' => $USER->id)
                    );

                    // Create object to insert a new step of the question attempt
                    $newStepData = new stdClass();
                    $newStepData->questionattemptid = $question_attempt->id;
                    $newStepData->sequencenumber = $latest_step ? $latest_step->sequencenumber + 1 : 1; // Set the sequence number
                    $newStepData->state = 'complete'; // Mark as complete
                    $newStepData->timecreated = time();
                    $newStepData->userid = $USER->id;

                    // Insert new step of the question attempt
                    $newStepId = $DB->insert_record('question_attempt_steps', $newStepData, true);

                    // Save the response in the question attempt
                    $record = new stdClass();
                    $record->attemptstepid = $newStepId;
                    $record->name = 'answer';
                    $record->value = $response['response'];
                    $DB->insert_record('question_attempt_step_data', $record);
                } catch (moodle_exception $e) {
                    $errors[] = array(
                        'status' => false,
                        'error' => $e->getMessage(),
                        'debuginfo' => $e->debuginfo,
                    );
                    $transaction->rollback($e);
                } catch (Exception $e) {
                    $errors[] = array(
                        'status' => false,
                        'errors' => $e->getMessage(),
                    );
                    $transaction->rollback($e);
                }
            }

            $transaction->allow_commit();

            if ($params['tofinish']) {
                $attempt = quiz_attempt::create($params['attemptid']);
                $attempt->process_finish(time(), true);
                // Commit transaction

                // Recalculate the grade
                $grade = quiz_rescale_grade($attempt->get_sum_marks(), $attempt->get_quiz());

                // Calculate the user's grade position
                $quizid = $attempt->get_quizid();
                $grades = $DB->get_records_sql(
                    "SELECT qg.grade
                     FROM {quiz_grades} qg
                     WHERE qg.quiz = :quizid
                     ORDER BY qg.grade DESC",
                    array('quizid' => $quizid)
                );

                $grades = array_values($grades);
                $userGrade = $grade;

                // Find the user's grade position
                $position = 0;
                foreach ($grades as $index => $gradeRecord) {
                    if ($gradeRecord->grade <= $userGrade) {
                        $position = $index + 1;
                        break;
                    }
                }

                $percentile = ($position / count($grades)) * 100;
            }

            // Return the result
            return array(
                'status' => 'success',
                'message' => 'Attempt processed successfully.',
                'total_points' => $grade ?? '',
                'percentile' => $percentile ?? ''
            );
        } catch (moodle_exception $e) {
            return array(
                'status' => false,
                'errors' => $e->getMessage(),
                'debuginfo' => $e->debuginfo,
            );
        } catch (Exception $e) {
            return array(
                'status' => false,
                'errors' => $e->getMessage(),
            );
        }

        // Return errors, if any
        if (!empty($errors)) {
            return array('status' => 'error', 'message' => 'Some errors occurred.', 'errors' => $errors);
        }

        return array('status' => 'success', 'message' => 'Responses stored successfully.');
    }

    public static function process_attempt_returns()
    {
        return new external_single_structure(
            array(
                'status' => new external_value(PARAM_TEXT, 'Status of the operation'),
                'message' => new external_value(PARAM_TEXT, 'Return message'),
                'total_points' => new external_value(PARAM_RAW, 'Total points obtained', VALUE_OPTIONAL),
                'percentile' => new external_value(PARAM_RAW, 'Total percentile of points obtained relative to other students', VALUE_OPTIONAL),
                'errors' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'status' => new external_value(PARAM_BOOL, 'Error status'),
                            'error' => new external_value(PARAM_TEXT, 'Error message'),
                            'debuginfo' => new external_value(PARAM_TEXT, 'Debug information', VALUE_OPTIONAL)
                        )
                    ),
                    'List of errors',
                    VALUE_OPTIONAL
                )
            )
        );
    }
}
