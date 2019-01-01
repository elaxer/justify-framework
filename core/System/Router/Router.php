<?php

namespace Core\System\Router;

/**
 * Class Router
 *
 * Use this class for working
 *
 * @package Justify\Router
 */
class Router
{
    /**
     * @var array list of all routes
     */
    private $routes = [];

    /**
     * Puts in $this->routes list new route
     *
     * @param string $method method of route
     * @param string $pattern route pattern string
     * @param mixed $handler what to use when this route is found
     */
    public function route($method, $pattern, $handler)
    {
        $this->routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'handler' => $handler,
            'regexp' => '',
            'found' => false,
            'parsed' => [],
            'vars' => []
        ];
    }

    /**
     * Puts in $this->routes list new route
     *
     * This kind of route not paying attention about method unlike route method
     *
     * @param string $pattern route pattern string
     * @param string $handler what to use when this route is found
     */
    public function any($pattern, $handler)
    {
        $this->routes[] = [
            'method' => '',
            'pattern' => $pattern,
            'handler' => $handler,
            'regexp' => '',
            'found' => false,
            'parsed' => [],
            'vars' => []
        ];
    }

    /**
     * Finds and returns suitable route
     *
     * If suitable route not found will returns array ['found' => false']
     * else will returns array ['found' => true, 'handler' => $handler, 'vars' => $vars];
     * where handler passed from methods "route" or "any", vars got from method parse
     *
     * @param string $method expected method
     * @param string $uri URI. Pass without query string
     * @return array found route
     */
    public function findRoute($method, $uri)
    {
        $this->parse();
        $route = [];

        foreach ($this->routes as $key => $value) {
            $isMatches = preg_match($this->routes[$key]['regexp'], $uri, $m);
            if ($isMatches && (!$this->routes[$key]['method'] || $this->routes[$key]['method'] === $method)) {
                $this->routes[$key]['vars'] = array_filter($m, function ($var) {
                    return !is_int($var);
                }, ARRAY_FILTER_USE_KEY);

                $route = $this->routes[$key];

                break;
            }
        }

        if (empty($route)) {
            return ['found' => false];
        }

        $route['found'] = true;

        return [
            'found' => $route['found'],
            'handler' => $route['handler'],
            'named_vars' => $route['vars'],
            'vars' => array_values($route['vars'])
        ];
    }

    /**
     * Modifies routes. Sets parsed information and full regular expression
     */
    private function parse()
    {
        foreach ($this->routes as $key => $value) {
            $manager = new PatternParser($this->routes[$key]['pattern']);

            $this->routes[$key]['parsed'] = $manager->getParsed();
            $this->routes[$key]['regexp'] = $manager->getRegexp();
        }
    }
}
