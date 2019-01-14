<?php

namespace Core\Components\DB\Connectors;

use Core\Exceptions\ExtensionNotFoundException;

class ConnectorFactory
{
    const NAMESPACE = 'Core\\Components\\DB\\Connectors\\';

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

        $connectorName = self::NAMESPACE . ucfirst($className);

        return new $connectorName();
    }
}
