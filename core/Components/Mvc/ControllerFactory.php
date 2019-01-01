<?php

namespace Core\Components\Mvc;

class ControllerFactory
{
    const NAMESPACE = 'App\\Controllers\\';

    public static function create(string $controller, array $params = [])
    {
        $className = self::NAMESPACE . $controller;

        return new $className($params);
    }
}
