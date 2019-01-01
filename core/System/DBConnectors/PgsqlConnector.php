<?php

namespace Core\System\DBConnectors;

use PDO;

class PgsqlConnector implements ConnectorInterface
{
    public function getInstance(array $connectionOptions, array $pdoOptions)
    {
        $host = $connectionOptions['host'];
        $user = $connectionOptions['user'];
        $password = $connectionOptions['password'];
        $name = $connectionOptions['name'];
        $charset = $connectionOptions['charset'];

        return new PDO(
            "pgsql:host=$host; dbname=$name; charset=$charset",
            $user, $password, $pdoOptions
        );
    }
}