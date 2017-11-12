<?php

namespace Justify\System;

use PDO;
use Justify;

/**
 * System abstract class Model consists of simple methods for work with DB
 */
abstract class Model
{
    /**
     * This property stores db connect
     *
     * @access private
     * @static
     */
    private static $_db;

    /**
     * Method returns all data in table
     *
     * Method can return big array which can load server work
     *
     * @param string $table
     * @static
     * @access public
     * @return array
     */
    public static function getAll($table)
    {
        $result = self::$_db->query("SELECT * FROM $table");
        return $result->fetchAll();
    }

    /**
     * Method returns number of records
     *
     * @param string $table table name
     * @param string $condition condition of query
     * @param array $variables array of variables in query
     * @static
     * @access public
     * @return integer
     */
    public static function count($table, $condition, $variables = [])
    {
        $query = self::$_db->prepare("SELECT COUNT(*) as `count` FROM $table WHERE $condition");
        $query->execute($variables);
        $res = $query->fetch();
        return intval($res['count']);
    }

    /**
     * Method returns number of records all table
     *
     * @param string $table table name
     * @static
     * @access public
     * @return integer
     */
    public static function countTable($table)
    {
        $query = self::$_db->query("SELECT COUNT(*) as `count` FROM $table");
        $result = $query->fetch();
        return intval($result['count']);
    }

    public static function get($table, $condition, $variables = [])
    {
        $result = self::$_db->prepare("SELECT * FROM $table WHERE $condition");
        return $result->execute($variables);
    }

    /**
     * Method execs your query
     *
     * @param string $query
     * @access public
     * @static
     * @return bool
     */
    public static function exec($query)
    {
        $result = self::$_db->exec($query);
        return $result;
    }

    /**
     * Method removes data base
     *
     * WARNING!
     * Be careful when using this method!
     *
     * @static
     * @access public
     * @return void
     */
    public static function dropDB()
    {
        self::exec("DROP DATABASE " . Justify::$settings['db']['name']);
    }

    /**
     * Method removes selected table
     *
     * WARNING!
     * Be careful when using this method!
     *
     * @static
     * @access public
     * @param string $table
     * @return void
     */
    public static function dropTable($table)
    {
        self::exec("DROP TABLE $table");
    }

    /**
     * Method purifies selected table
     *
     * WARNING!
     * Be careful when using this method!
     *
     * @static
     * @access public
     * @param string $table
     * @return void
     */
    public static function clearTable($table)
    {
        self::exec("TRUNCATE TABLE $table");
    }

    /**
     * Method returns DSM version
     *
     * @access public
     * @static
     * @return string
     */
    public static function version()
    {
        $query = self::$_db->query("SELECT VERSION() AS version");
        $version = $query->fetch();
        return $version['version'];
    }

    /**
     * Method provides connection this DB
     *
     * Choose DB properties in config/db.php
     * Don't forget to disconnect with DB using disconnect() method
     *
     * @static
     * @access public
     * @return bool
     */
    public static function connect()
    {
        $settings = Justify::$settings;

        $connection = new PDO(
            "mysql:host={$settings['db']['host']};dbname={$settings['db']['name']};charset={$settings['db']['charset']}",
            $settings['db']['user'],
            $settings['db']['password']
        );

        if ($connection) {
            self::$_db = $connection;
            return true;
        }
        return false;
    }

    /**
     * Method returns errors status
     *
     * @access public
     * @static
     * @return string
     */
    public static function error()
    {
        return self::$_db->errorInfo();
    }

    /**
     * Method disconnects DB
     *
     * @access public
     * @static
     * @return void
     */
    public static function disconnect()
    {
        self::$_db = null;
    }

    /**
     * Method return encoded variable
     *
     * Returns variable safe
     * Use this method when you work with data
     *
     * @access public
     * @static
     * @param mixed $var variable to encode
     * @return string
     */
    public static function encode($var)
    {
        return htmlspecialchars(trim($var));
    }

    /**
     * Method return decoded variable
     *
     * Warning!
     * Decoded variable is unsafe
     * Don't use this method when you upload data in data base
     *
     * @access public
     * @static
     * @param mixed $var variable to decode
     * @return string
     */
    public static function decode($var)
    {
        return htmlspecialchars_decode($var);
    }

}
