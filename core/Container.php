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
     * @param $component
     * @return bool|mixed
     */
    public function get($component)
    {
        if (!isset($this->container[$component])) {
            return false;
        }

        return $this->container[$component];
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
