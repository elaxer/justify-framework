<?php

namespace Core\System;

use Core\System\Exceptions\InvalidCallException;

/**
 * Class Base
 *
 * Init behaviours for class
 *
 * @since 1.6
 * @package Justify\System
 */
class BaseObject
{
    /**
     * Method throws exception when called undefined property of object
     *
     * @param string $name property name
     */
    public function __get(string $name)
    {
        throw new UndefinedPropertyException('Called property ' . self::getClassName() . "::$name  not found");
    }

    /**
     * Method throws exception when called undefined property of object
     *
     * @param string $name property name
     * @param mixed $value sets value
     */
    public function __set(string $name, $value)
    {
        throw new UndefinedPropertyException('Called property ' . self::getClassName() . "::$name  not found");
    }

    /**
     * Method throws exception when calls undefined method
     *
     * @throws InvalidCallException
     * @param string $name name of method
     * @param array $arguments arguments for method
     */
    public function __call(string $name, array $arguments)
    {
        throw new InvalidCallException('Called method ' . self::getClassName() . "::$name()  not found");
    }

    /**
     * Returns calls class name
     *
     * @return string
     */
    public static function getClassName(): string
    {
        $class = get_called_class();
        $segments = explode('\\', $class);
        
        return array_pop($segments);
    }
}
