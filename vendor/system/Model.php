<?php

namespace Justify\System;

use PDO;
use PDOException;
use Justify;

/**
 * Class Model
 *
 * System class Model consists of simple methods for work with DB
 *
 * @package Justify\System
 */
class Model
{
    /**
     * This property stores db connect
     *
     * @access private
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
        try {
            $result = $this->_db->query("SELECT * FROM $table");

            return $result->fetchAll();
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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
        try {
            $query = $this->_db->prepare("SELECT COUNT(*) as `count` FROM $table WHERE $condition");
            $query->execute($variables);
            $res = $query->fetch();

            return intval($res['count']);
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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
        try {
            $query = $this->_db->query("SELECT COUNT(*) as `count` FROM $table");
            $result = $query->fetch();

            return intval($result['count']);
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
    }

    public function get($table, $condition, $variables = [])
    {
        try {
            $result = $this->_db->prepare("SELECT * FROM $table WHERE $condition");

            return $result->execute($variables);
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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
        try {
            $result = $this->_db->exec($query);

            return $result;
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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
        try {
            $this->exec('DROP DATABASE ' . Justify::$settings['db']['name']);
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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
        try {
            $this->exec("DROP TABLE $table");
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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
        try {
            $this->exec("TRUNCATE TABLE $table");
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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
        try {
            $query = $this->_db->query('SELECT VERSION() AS version');
            $version = $query->fetch();

            return $version['version'];
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
    }

    /**
     * Method returns errors status
     *
     * @access public
     *
     * @return array
     */
    public function error()
    {
        try {
            return $this->_db->errorInfo();
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();
            }
        }
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

        try {
            $connection = new PDO(
                "mysql:host={$settings['db']['host']};"
                . "dbname={$settings['db']['name']};"
                . "charset={$settings['db']['charset']}",
                $settings['db']['user'],
                $settings['db']['password'],
                Justify::$settings['db']['PDOSettings']
            );

            $this->_db = $connection;
        } catch (PDOException $e) {
            if (Justify::$debug) {
                echo '<b>PDO Exception: </b>';
                echo $e->getMessage();

                exit();
            }

            exit();
        }
    }

    /**
     * Model destructor
     * 
     * Nullifies db connection then db not used
     */
    public function __destruct()
    {
        $this->_db = null;
    }
}
