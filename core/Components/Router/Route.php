<?php

namespace Core\Components\Router;

class Route
{
    public static function get($pattern, $handler)
    {
        $route = router()->route('GET', $pattern, $handler);
    }

    public static function post($pattern, $handler)
    {
        $route = router()->route('POST', $pattern, $handler);
    }

    public static function any($pattern, $handler)
    {
        $route = router()->any($pattern, $handler);
    }

    public function middleware($middleware)
    {

    }
}
