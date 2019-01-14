<?php

namespace Core\Components\DB\Connectors;

use PDO;

class Mysql implements ConnectorInterface
{
    public function getInstance(array $connectionOptions, array $pdoOptions)
    {
        $host = $connectionOptions['host'];
        $user = $connectionOptions['user'];
        $password = $connectionOptions['password'];
        $name = $connectionOptions['name'];
        $charset = $connectionOptions['charset'];

        return new PDO(
            "mysql:host=$host; dbname=$name; charset=$charset",
            $user, $password, $pdoOptions
        );
    }
}
