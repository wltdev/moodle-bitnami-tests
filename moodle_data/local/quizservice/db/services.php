<?php
$functions = array(
    'local_quizservice_get_quiz_questions' => array(
        'classname'   => 'local_quizservice_external',
        'methodname'  => 'get_quiz_questions',
        'classpath'   => 'local/quizservice/externallib.php',
        'description' => 'Returns quiz questions in JSON format.',
        'type'        => 'read',
        'ajax'        => true
    ),
);

$services = array(
    'QuizService' => array(
        'functions' => array('local_quizservice_get_quiz_questions'),
        'restrictedusers' => 0,
        'enabled' => 1,
    )
);
