<?php

namespace Core\System;

class ControllerFactory
{
    public static function create(string $controller, array $params = [])
    {
        $className = 'App\\Controllers\\' . $controller;

        return new $className($params);
    }
}
