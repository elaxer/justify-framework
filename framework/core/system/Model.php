<?php

namespace justify\framework\core\system;

use PDO;

/**
 * System abstract class Model consists of simple methods for work with DB
 * @abstract
 */
abstract class Model
{
    /**
     * This property stores db connect
     * @access private
     * @static
     */
    private static $db;

    /**
     * Method returns all data in table
     * Method can return big array which can load server work
     * @param string $table
     * @static
     * @access protected
     * @return array
     */
    protected static function getAll($table)
    {
        $result = self::$db->query("SELECT * FROM $table");
        return $result->fetchAll();
    }

    /**
     * Method returns number of records
     * @param string $table table name
     * @param string $condition condition of query
     * @param array $variables array of variables in query
     * @static
     * @access protected
     * @return integer
     */
    protected static function count($table, $condition, $variables = array())
    {
        $query = self::$db->prepare("SELECT COUNT(*) as `count` FROM $table WHERE $condition");
        $query->execute($variables);
        $res = $query->fetch();
        return intval($res['count']);
    }

    /**
     * Method returns number of records all table
     * @param string $table table name
     * @static
     * @access protected
     * @return integer
     */
    protected static function countTable($table)
    {
        $query = self::$db->query("SELECT COUNT(*) as `count` FROM $table");
        $result = $query->fetch();
        return intval($result['count']);
    }

    protected static function get($table, $condition, $variables = array())
    {
        $result = self::$db->prepare("SELECT * FROM $table WHERE $condition");
        return $result->execute($variables);
    }

    /**
     * Method execs your query
     * @param string $query
     * @access protected
     * @static
     * @return bool
     */
    protected static function exec($query)
    {
        $result = self::$db->exec($query);
        return $result;
    }

    /**
     * Method delets data base
     * WARNING!
     * Be careful when using this method!
     * @static
     * @access protected
     * @return void
     */
    protected static function dropDB()
    {
        $settings = require BASE_DIR . '/config/settings.php';
        self::exec("DROP DATABASE {$settings['db']['name']}");
    }

    /**
     * Method delets choosed table
     * WARNING!
     * Be careful when using this method!
     * @static
     * @access protected
     * @param string $table
     * @return void
     */
    protected static function dropTable($table)
    {
        self::exec("DROP TABLE $table");
    }

    /**
     * Method purifies choosed table
     * WARNING!
     * Be careful when using this method!
     * @static
     * @access protected
     * @param string $table
     * @return void
     */
    protected static function clearTable($table)
    {
        self::exec("TRUNCATE TABLE $table");
    }

    /**
     * Method returns DSM version
     * @access protected
     * @static
     * @return string
     */
    protected static function version()
    {
        $query = self::$db->query("SELECT VERSION() AS version");
        $version = $query->fetch();
        return $version['version'];
    }

    /**
     * Method provides connection this DB
     * Choose DB properties in config/settings.php
     * Don't forget to disconnect with DB using disconnect() method
     * @static
     * @access protected
     * @return bool
     */
    protected static function connect()
    {
        $settings = require BASE_DIR . '/config/settings.php';

        $connection = new PDO(
            "mysql:host={$settings['db']['host']};dbname={$settings['db']['name']};charset={$settings['db']['charset']}",
            $settings['db']['user'],
            $settings['db']['password']
        );

        if ($connection) {
            self::$db = $connection;
            return true;
        }
        return false;
    }

    /**
     * Method returns errors status
     * @access protected
     * @static
     * @return string
     */
    protected static function error()
    {
        return self::$db->errorInfo();
    }

    /**
     * Method diconnects DB
     * @access protected
     * @static
     * @return void
     */
    protected static function disconnect()
    {
        self::$db = null;
    }

}
