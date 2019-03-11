<?php

namespace Core;

/**
 * Class Container
 *
 * @package Core
 */
class Container
{
    /**
     * @var array
     */
    private $container = [];

    /**
     * @param string $componentName
     * @return bool|mixed
     */
    public function get($componentName)
    {
        if (!isset($this->container[$componentName])) {
            return false;
        }

        return $this->container[$componentName];
    }

    /**
     * @param $component
     * @param $object
     */
    public function set($component, $object)
    {
        $this->container[$component] = $object;
    }
}
