<?php

$functions = array(
    'local_quizjsonservice_get_attempt_data' => array(
        'classname'   => 'local_quizjsonservice_external',
        'methodname'  => 'get_attempt_data',
        'classpath'   => 'local/quizjsonservice/externallib.php',
        'description' => 'Returns quiz attempt data in JSON format.',
        'type'        => 'read',
        'ajax'        => true,
    ),
);

$services = array(
    'Quiz JSON Service' => array(
        'functions' => array('local_quizjsonservice_get_attempt_data'),
        'restrictedusers' => 0,
        'enabled' => 1,
    )
);
