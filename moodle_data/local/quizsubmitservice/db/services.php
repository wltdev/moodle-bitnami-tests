<?php

$functions = array(
    'local_quizsubmit_submit_quiz_attempt' => array(
        'classname'   => 'local_quizsubmit_external',
        'methodname'  => 'process_attempt',
        'classpath'   => 'local/quizsubmitservice/externallib.php',
        'description' => 'Process a quiz attempt and finalize it, returning the obtained points',
        'type'        => 'write',
        'ajax'        => true,
    ),
);

$services = array(
    'Quiz Submission Service' => array(
        'functions' => array('local_quizsubmit_submit_quiz_attempt'),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'quizsubmitservice',
    ),
);
