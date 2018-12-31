<?php

namespace Core\System;

use Core\FactoryInterface;

class ControllerFactory implements FactoryInterface
{
    public static function create(string $controller, array $params = [])
    {
        $className = 'App\\Controllers\\' . $controller;

        return new $className($params);
    }
}
