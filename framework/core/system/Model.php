<?php

namespace framework\core\system;

use PDO;

abstract class Model
{
    private static $db;
    protected static function getAll($table)
    {
        $result = self::$db->query("SELECT * FROM $table");
        return $result->fetchAll();
    }

    protected static function get($table, $condition, $variables = array())
    {
        $result = self::$db->prepare("SELECT * FROM $table WHERE " . $condition);
        return $result->execute($variables);
    }

    protected static function exec($query)
    {
        $result = self::$db->exec($query);
        return $result;
    }

    protected static function dropDB()
    {
        $settings = require BASE_DIR . '/config/settings.php';
        self::exec("DROP DATABASE {$settings['db']['name']}");
    }

    protected static function dropTable($table)
    {
        self::exec("DROP TABLE $table");
    }

    protected static function clearTable($table)
    {
        self::exec("TRUNCATE TABLE $table");
    }

    protected static function version()
    {
        $query = self::$db->query("SELECT VERSION() AS version");
        $version = $query->fetch();
        return $version['version'];
    }


    protected static function connect()
    {
        $settings = require BASE_DIR . '/config/settings.php';

        $connection = new PDO(
            "mysql:host={$settings['db']['host']};
            dbname={$settings['db']['name']};
            charset={$settings['db']['charset']}",
            $settings['db']['user'],
            $settings['db']['password']
        );

        if ($connection) {
            self::$db = $connection;
            return true;
        }
        return false;
    }

    protected static function error()
    {
        return self::$db->errorInfo();
    }

    protected static function disconnect()
    {
        self::$db = null;
    }

}
