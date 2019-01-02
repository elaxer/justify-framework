<?php

namespace Core\Components\DB\Connectors;

use Core\Exceptions\ExtensionNotFoundException;

class ConnectorFactory
{
    const NAMESPACE = 'Core\\System\\DBConnectors\\';

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

        $connectorName = self::NAMESPACE . ucfirst($className) . 'Connector';

        return new $connectorName();
    }
}
