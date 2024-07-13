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
                'responses' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'questionid' => new external_value(PARAM_INT, 'ID da questão'),
                            'response' => new external_value(PARAM_RAW, 'Resposta do usuário'),
                            'slot' => new external_value(PARAM_INT, 'Slot da questão')
                        )
                    )
                )
            )
        );
    }

    public static function process_attempt($attemptid, $responses)
    {
        global $DB, $USER;
        // Validar parâmetros.
        $params = self::validate_parameters(self::process_attempt_parameters(), array(
            'attemptid' => $attemptid,
            'responses' => $responses
        ));

        // Inicializar um array para coletar erros
        $errors = array();

        try {
            // Verificar se a tentativa existe
            if (!$DB->record_exists('quiz_attempts', array('id' => $params['attemptid']))) {
                throw new moodle_exception('attemptnotfound', 'local_storequizresponses', '', $params['attemptid']);
            }

            // Iniciar transação
            $transaction = $DB->start_delegated_transaction();

            foreach ($params['responses'] as $response) {
                try {
                    // Verificar se a questão existe
                    if (!$DB->record_exists('question', array('id' => $response['questionid']))) {
                        $errors[] = "Questão com ID {$response['questionid']} não encontrada.";
                        continue;
                    }

                    // Buscar a tentativa da questão
                    $question_attempt = $DB->get_record('question_attempts', array('questionusageid' => $params['attemptid'], 'slot' => $response['slot']), '*', IGNORE_MULTIPLE);

                    // Buscar o último passo da tentativa da questão
                    $latest_step = $DB->get_record_sql(
                        '
                    SELECT *
                    FROM {question_attempt_steps}
                    WHERE questionattemptid = :questionattemptid AND userid = :userid
                    ORDER BY sequencenumber DESC
                    LIMIT 1',
                        array('questionattemptid' => $question_attempt->id, 'userid' => $USER->id)
                    );

                    // Criar objeto para inserir um novo passo da tentativa da questão
                    $newStepData = new stdClass();
                    $newStepData->questionattemptid = $question_attempt->id;
                    $newStepData->sequencenumber = $latest_step ? $latest_step->sequencenumber + 1 : 1; // Definir o número da sequência
                    $newStepData->state = 'complete'; // Marcar como completa
                    $newStepData->timecreated = time();
                    $newStepData->userid = $USER->id;

                    // Inserir novo passo da tentativa da questão
                    $newStepId = $DB->insert_record('question_attempt_steps', $newStepData, true);

                    // Salvar a resposta na tentativa da questão
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
                        'error' => $e->getMessage(),
                    );
                    $transaction->rollback($e);
                }
            }


            // Atualizar estado da tentativa para 'finished' e salvar os pontos
            $attempt = quiz_attempt::create($params['attemptid']);
            $attempt->process_finish(time(), true);
            // Commitar transação
            $transaction->allow_commit();

            // Recalcula a nota.
            $grade = quiz_rescale_grade($attempt->get_sum_marks(), $attempt->get_quiz());

            // Calcular a posição da nota do usuário
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

            // Encontra a posição da nota do usuário
            $position = 0;
            foreach ($grades as $index => $gradeRecord) {
                if ($gradeRecord->grade <= $userGrade) {
                    $position = $index + 1;
                    break;
                }
            }

            $percentile = ($position / count($grades)) * 100;

            return array(
                'status' => 'success',
                'message' => 'Tentativa processada com sucesso.',
                'total_points' => $grade,
                'percentile' => $percentile
            );
        } catch (moodle_exception $e) {
            return array(
                'status' => false,
                'error' => $e->getMessage(),
                'debuginfo' => $e->debuginfo,
            );
        } catch (Exception $e) {
            return array(
                'status' => false,
                'errors' => $e->getMessage(),
            );
        }

        // Retornar erros, se houver
        if (!empty($errors)) {
            return array('status' => 'error', 'message' => 'Ocorreram alguns erros.', 'errors' => $errors);
        }

        return array('status' => 'success', 'message' => 'Respostas armazenadas com sucesso.');
    }

    public static function process_attempt_returns()
    {
        return new external_single_structure(
            array(
                'status' => new external_value(PARAM_TEXT, 'Status da operação'),
                'message' => new external_value(PARAM_TEXT, 'Mensagem de retorno'),
                'total_points' => new external_value(PARAM_RAW, 'Total de pontos obtidos'),
                'percentile' => new external_value(PARAM_RAW, 'Total em percentil de pontos obtidos em relação aos outros alunos'),
                'errors' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'status' => new external_value(PARAM_BOOL, 'Status do erro'),
                            'error' => new external_value(PARAM_TEXT, 'Mensagem de erro'),
                            'debuginfo' => new external_value(PARAM_TEXT, 'Informações de debug', VALUE_OPTIONAL)
                        )
                    ),
                    'Lista de erros',
                    VALUE_OPTIONAL
                )
            )
        );
    }
}
