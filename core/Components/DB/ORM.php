<?php

namespace Core\Components\DB;

use PDO;
use Core\Justify;
use Core\Components\Str;
use Core\Components\DB\Connectors\ConnectorFactory;
use Core\Exceptions\ExtensionNotFoundException;

/**
 * Class DB
 *
 * System class DB consists of simple methods for work with DB
 *
 * @since 2.0
 * @package Justify\System
 */
class ORM
{
    /**
     * PDO resource
     *
     * @var PDO
     */
    private $db;

    /**
     * Table name
     *
     * @var string
     */
    private $table;

    /**
     * SQL query
     *
     * @var string
     */
    private $query;

    /**
     * SQL query params
     *
     * @var array
     */
    private $params = [];

    /**
     * Starts SQL query
     *
     * Makes SQL query "SELECT * FROM table" and returns object
     *
     * @return ORM
     */
    public static function find()
    {
        $object = new static();
        $object->query = "SELECT * FROM {$object->table}";

        return $object;
    }

    /**
     * Returns object of one data
     *
     * @param int $identify record identify
     * @param string $identifyName name of identifier
     * @return object
     * @throws \Core\Exceptions\ExtensionNotFoundException
     */
    public static function findOne(int $identify, string $identifyName = 'id'): object
    {
        $object = new static();
        $stmt = $object->db->prepare("SELECT * FROM {$object->table} WHERE $identifyName = ?");
        $stmt->execute([$identify]);

        return $stmt->fetch();
    }

    /**
     * Returns total count of all records
     *
     * @return int
     * @throws \Core\Exceptions\ExtensionNotFoundException
     */
    public static function totalCount()
    {
        $object = new static();
        $stmt = $object->db->query("SELECT COUNT(*) as count FROM {$object->table}");

        return intval($stmt->fetch()->count);
    }

    /**
     * Returns array of all data
     *
     * @return array
     * @throws \Core\Exceptions\ExtensionNotFoundException
     */
    public static function findAll()
    {
        $object = new static();
        $stmt = $object->db->query("SELECT * FROM {$object->table}");

        return $stmt->fetchAll();
    }

    /**
     * Execs your SQL query and returns result
     *
     * @param string $query SQL query
     * @return int
     * @throws \Core\Exceptions\ExtensionNotFoundException
     */
    public static function exec($query)
    {
        $object = new static();

        return $object->db->exec($query);
    }

    /**
     * Clears all table data
     *
     * @return int
     * @throws \Core\Exceptions\ExtensionNotFoundException
     */
    public static function clearTable()
    {
        $object = new static();

        return $object->exec("TRUNCATE TABLE {$object->table}");
    }

    /**
     * Drops table
     *
     * @return int
     * @throws \Core\Exceptions\ExtensionNotFoundException
     */
    public static function dropTable()
    {
        $object = new static();

        return $object->exec("DROP TABLE {$object->table}");
    }

    /**
     * Drops data base
     *
     * @return int
     * @throws \Core\Exceptions\ExtensionNotFoundException
     */
    public static function dropDB()
    {
        $object = new static();

        return $object->exec("DROP DATABASE " . Justify::$settings['db']['name']);
    }

    /**
     * Sets SQL query from find() method
     *
     * Sets "SELECT columns"
     *
     * @param string|array $select selects items
     * @return ORM
     */
    public function select($select)
    {
        if (is_array($select)) {
            $this->query = "SELECT " . implode(', ', $select);
        } else {
            $this->query = "SELECT $select";
        }

        return $this;
    }

    /**
     * Sets SQL query from find() method
     *
     * Sets "SELECT COUNT(columns)"
     * Use it to discover to count of rows from SQL query
     *
     * @param string|array $select selects items
     * @return ORM
     */
    public function selectCount($select)
    {
        if (is_array($select)) {
            $this->query = "SELECT COUNT(" . implode(', ', $select) . ')';
        } else {
            $this->query = "SELECT COUNT($select)";
        }

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "FROM table"
     *
     * @param string $from from table name
     * @return ORM
     */
    public function from($from)
    {
        $this->query .= " FROM $from";

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "WHERE condition"
     *
     * @param string $condition condition of where
     * @param array $params array of values
     * @return ORM
     */
    public function where($condition, array $params = [])
    {
        $this->query .= " WHERE $condition";
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "AND WHERE condition"
     *
     * @param string $condition condition of where
     * @param array $params array of values
     * @return ORM
     */
    public function andWhere($condition, array $params = [])
    {
        $this->query .= " AND WHERE $condition";
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "OR WHERE condition"
     *
     * @param string $condition condition of where
     * @param array $params array of values
     * @return ORM
     */
    public function orWhere($condition, array $params = [])
    {
        $this->query .= " OR WHERE $condition";
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "ORDER BY column sort_method"
     *
     * @param string $column column name
     * @param string $sort sort method
     * @return ORM
     */
    public function orderBy($column, $sort = 'ASC')
    {
        $this->query .= " ORDER BY $column $sort";

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "LIMIT number"
     *
     * @param int $limit limit of SQL query
     * @return ORM
     */
    public function limit($limit)
    {
        $this->query .= " LIMIT ?";
        $this->params = array_merge($this->params, [$limit]);

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "OFFSET number"
     *
     * @param int $offset offset of SQL query
     * @return ORM
     */
    public function offset($offset)
    {
        $this->query .= " OFFSET ?";
        $this->params = array_merge($this->params, [$offset]);

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "GROUP BY column"
     *
     * @param string $column column name
     * @return ORM
     */
    public function groupBy($column)
    {
        $this->query .= " GROUP BY $column";

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "INNER JOIN table ON condition"
     *
     * @param string $table joins table
     * @param string $on join condition
     * @return ORM
     */
    public function join($table, $on)
    {
        $this->query .= " INNER JOIN $table ON $on";

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "LEFT JOIN table ON condition"
     *
     * @param string $table joins table
     * @param string $on join condition
     * @return ORM
     */
    public function leftJoin($table, $on)
    {
        $this->query .= " LEFT JOIN $table ON $on";

        return $this;
    }

    /**
     * Continues SQL query from find() method
     *
     * Concatenates "RIGHT JOIN table ON condition"
     *
     * @param string $table joins table
     * @param string $on join condition
     * @return ORM
     */
    public function rightJoin($table, $on)
    {
        $this->query .= " RIGHT JOIN $table ON $on";

        return $this;
    }

    /**
     * Execs SQL query from find() method and returns array of data
     *
     * @return array
     */
    public function all()
    {
        $stmt = $this->db->prepare($this->query);
        $stmt->execute($this->params);

        return $stmt->fetchAll();
    }

    /**
     * Execs SQL query from find() method and returns object of one data
     *
     * @return object
     */
    public function one()
    {
        $stmt = $this->db->prepare($this->query);
        $stmt->execute($this->params);

        return $stmt->fetch();
    }

    /**
     * Execs SQL query from find() method and returns count of selected rows
     *
     * It's slow method, be careful then using it
     *
     * @return int
     */
    public function count()
    {
        $stmt = $this->db->prepare($this->query);
        $stmt->execute($this->params);

        return $stmt->rowCount();
    }

    /**
     * Method provides connection this DB
     *
     * Change DB connecting properties in config/db.php
     *
     * @throws ExtensionNotFoundException
     */
    public function __construct()
    {
        $db = config()['db'];

        $connector = ConnectorFactory::create($db['dbms']);
        $this->db = $connector->getInstance($db[$db['dbms']], $db['pdo_options']);

        $this->table = static::tableName();
    }

    /**
     * Nullifies data base connection
     */
    public function __destruct()
    {
        $this->db = null;
    }
}
