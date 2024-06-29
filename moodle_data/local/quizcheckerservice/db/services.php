<?php

$functions = array(
    'local_quizchecker_get_user_quizzes' => array(
        'classname' => 'local_quizchecker_external',
        'methodname' => 'get_user_quizzes',
        'classpath' => 'local/quizcheckerservice/externallib.php',
        'description' => 'Retrieve quizzes from a course and check if the user has started them.',
        'type' => 'read',
        'ajax' => true,
        'capabilities' => 'mod/quiz:view',
    ),
);

$services = array(
    'Quiz Checker Service' => array(
        'functions' => array('local_quizchecker_get_user_quizzes'),
        'restrictedusers' => 0,
        'enabled' => 1,
    ),
);
