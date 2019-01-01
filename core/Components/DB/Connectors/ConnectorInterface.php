<?php

namespace Core\Components\DB\Connectors;

interface ConnectorInterface
{
    public function getInstance(array $connectionOptions, array $pdoOptions);
}
