<?php

namespace Justify\System;

use Justify\Exceptions\UndefinedPropertyException;
use Justify\Exceptions\InvalidCallException;

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
        try {
            throw new UndefinedPropertyException(
                'Called property ' . self::getClassName() . "::$name  not found"
            );
        } catch (UndefinedPropertyException $e) {
            $e->printError();
            exit();
        }
    }

    /**
     * Method throws exception when called undefined property of object
     *
     * @param string $name property name
     * @param mixed $value sets value
     */
    public function __set(string $name, $value)
    {
        try {
            throw new UndefinedPropertyException(
                'Called property ' . self::getClassName() . "::$name  not found"
            );
        } catch (UndefinedPropertyException $e) {
            $e->printError();
            exit();
        }
    }

    /**
     * Method throws exception when calls undefined method
     *
     * @param string $name name of method
     * @param array $arguments arguments for method
     */
    public function __call(string $name, array $arguments)
    {
        try {
            throw new InvalidCallException(
                'Called method ' . self::getClassName() . "::$name()  not found"
            );
        } catch (InvalidCallException $e) {
            $e->printError();
            exit();
        }
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
