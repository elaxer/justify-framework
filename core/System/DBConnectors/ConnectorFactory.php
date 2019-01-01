<?php

namespace Core\System\DBConnectors;

use Core\System\Exceptions\ExtensionNotFoundException;

class ConnectorFactory
{
    /**
     * @param string $className
     * @return mixed
     * @throws ExtensionNotFoundException
     */
    public static function create(string $className)
    {
        if (!extension_loaded('PDO')) {
            throw new ExtensionNotFoundException('PDO');
        }

        $connectorName = 'Core\\System\\DBConnectors\\' . ucfirst($className) . 'Connector';

        return new $connectorName();
    }
}
