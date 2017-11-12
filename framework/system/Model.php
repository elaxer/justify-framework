<?php

namespace Justify\System;

use PDO;
use Justify;

/**
 * System abstract class Model consists of simple methods for work with DB
 */
class Model
{
    /**
     * This property stores db connect
     *
     * @access private
     *
     */
    private $_db;

    /**
     * Method returns all data in table
     *
     * Method can return big array which can load server work
     *
     * @param string $table
     *
     * @access public
     * @return array
     */
    public function getAll($table)
    {
        $result = $this->_db->query("SELECT * FROM $table");
        return $result->fetchAll();
    }

    /**
     * Method returns number of records
     *
     * @param string $table table name
     * @param string $condition condition of query
     * @param array $variables array of variables in query
     *
     * @access public
     * @return integer
     */
    public function count($table, $condition, $variables = [])
    {
        $query = $this->_db->prepare("SELECT COUNT(*) as `count` FROM $table WHERE $condition");
        $query->execute($variables);
        $res = $query->fetch();
        return intval($res['count']);
    }

    /**
     * Method returns number of records all table
     *
     * @param string $table table name
     *
     * @access public
     * @return integer
     */
    public function countTable($table)
    {
        $query = $this->_db->query("SELECT COUNT(*) as `count` FROM $table");
        $result = $query->fetch();
        return intval($result['count']);
    }

    public function get($table, $condition, $variables = [])
    {
        $result = $this->_db->prepare("SELECT * FROM $table WHERE $condition");
        return $result->execute($variables);
    }

    /**
     * Method execs your query
     *
     * @param string $query
     * @access public
     *
     * @return bool
     */
    public function exec($query)
    {
        $result = $this->_db->exec($query);
        return $result;
    }

    /**
     * Method removes data base
     *
     * WARNING!
     * Be careful when using this method!
     *
     *
     * @access public
     * @return void
     */
    public function dropDB()
    {
        $this->exec("DROP DATABASE " . Justify::$settings['db']['name']);
    }

    /**
     * Method removes selected table
     *
     * WARNING!
     * Be careful when using this method!
     *
     *
     * @access public
     * @param string $table
     * @return void
     */
    public function dropTable($table)
    {
        $this->exec("DROP TABLE $table");
    }

    /**
     * Method purifies selected table
     *
     * WARNING!
     * Be careful when using this method!
     *
     *
     * @access public
     * @param string $table
     * @return void
     */
    public function clearTable($table)
    {
        $this->exec("TRUNCATE TABLE $table");
    }

    /**
     * Method returns DSM version
     *
     * @access public
     *
     * @return string
     */
    public function version()
    {
        $query = $this->_db->query("SELECT VERSION() AS version");
        $version = $query->fetch();
        return $version['version'];
    }

    /**
     * Method provides connection this DB
     *
     * Choose DB properties in config/db.php
     * Don't forget to disconnect with DB using disconnect() method
     *
     *
     * @access public
     */
    public function __construct()
    {
        $settings = Justify::$settings;
        $connection = new PDO(
            "mysql:host={$settings['db']['host']};dbname={$settings['db']['name']};charset={$settings['db']['charset']}",
            $settings['db']['user'],
            $settings['db']['password']
        );
        if ($connection) {
            $this->_db = $connection;
        }
    }

    public function __destruct()
    {
        $this->_db = null;
    }

    /**
     * Method returns errors status
     *
     * @access public
     *
     * @return string
     */
    public function error()
    {
        return $this->_db->errorInfo();
    }

    /**
     * Method return encoded variable
     *
     * Returns variable safe
     * Use this method when you work with data
     *
     * @access public
     *
     * @param mixed $var variable to encode
     * @return string
     */
    public function encode($var)
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
     *
     * @param mixed $var variable to decode
     * @return string
     */
    public function decode($var)
    {
        return htmlspecialchars_decode($var);
    }

}
