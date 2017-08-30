<?php

namespace framework\core\system;

abstract class Model
{
    protected static function connect()
    {
        $settings = require BASE_DIR . '/settings.php';

        $connection = new PDO("mysql:host={$settings['db']['host']};dbname={$settings['db']['name']};charset={$settings['db']['charset']}", $settings['db']['user'], $settings['db']['password']);

        if ($connection) {
            return $connection;
        }
        return false;
    }

}