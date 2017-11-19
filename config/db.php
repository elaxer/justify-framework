<?php
return [
    'host' => '127.0.0.1', //Data base host
    'user' => 'root', //Data base user name
    'password' => '123456', //User password
    'name' => 'forum', //Data base name
    'charset' => 'utf8', //Data base charset
    'PDOSettings' => [ //PDO settings
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
];
