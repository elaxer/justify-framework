<?php
namespace Base;
abstract class Model
{
    protected static function connect()
    {
        $settings = require BASE_DIR . '/settings.php';
        $host = $settings['db']['host'];
        $dbname = $settings['db']['name'];
        $user = $settings['db']['user'];
        $password = $settings['db']['password'];
        $charset = $settings['db']['charset'];

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $connection = new PDO($dsn, $user, $password);

        if ($connection) {
            return $connection;
        }
        return false;
    }

}