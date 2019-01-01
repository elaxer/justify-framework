<?php

namespace Core\Components\DB\Connectors;

use PDO;

class SqliteConnector implements ConnectorInterface
{
    public function getInstance(array $connectionOptions, array $pdoOptions)
    {
        return new PDO("sqlite:{$connectionOptions['path']}");
    }
}