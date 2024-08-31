<?php

$functions = array(
    'local_get_user_info' => array(
        'classname'   => 'get_user_info',
        'methodname'  => 'fetch_user_data',
        'classpath'   => 'local/getuserinfoservice/externallib.php',
        'description' => 'Get user info',
        'type'        => 'read',
        'ajax'        => true,
    ),
);

$services = array(
    'Get User Information' => array(
        'functions' => array('local_get_user_info'),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'getuserinfoservice',
    ),
);
