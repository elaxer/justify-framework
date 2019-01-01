<?php

namespace Core\System\DBConnectors;

use PDO;

class SqliteConnector implements ConnectorInterface
{
    public function getInstance(array $connectionOptions, array $pdoOptions)
    {
        return new PDO("sqlite:{$connectionOptions['path']}");
    }
}