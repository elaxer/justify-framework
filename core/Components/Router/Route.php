<?php

namespace Core\Components\Router;

class Route
{
    public static function get($pattern, $handler)
    {
        router()->route('GET', $pattern, $handler);
    }

    public static function post($pattern, $handler)
    {
        router()->route('POST', $pattern, $handler);
    }

    public static function any($pattern, $handler)
    {
        router()->any($pattern, $handler);
    }
}
