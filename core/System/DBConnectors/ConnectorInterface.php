<?php

namespace Core\System\DBConnectors;

interface ConnectorInterface
{
    public function getInstance(array $connectionOptions, array $pdoOptions);
}
