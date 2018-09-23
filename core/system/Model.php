<?php

namespace Justify\System;

use Justify\Components\Str;

/**
 * Class Model
 *
 * @package Justify\System
 */
class Model extends BaseObject
{
    /**
     * Method return encoded variable
     *
     * Returns variable safe
     * Use this method when you work with data
     *
     * @param mixed $var variable to encode
     * @return string
     */
    public static function encode($var): string
    {
        return htmlspecialchars(trim($var), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Method return decoded variable
     *
     * Warning!
     * Decoded variable is unsafe
     * Don't use this method when you upload data in data base
     *
     * @param mixed $var variable to decode
     * @return string
     */
    public static function decode($var): string
    {
        return htmlspecialchars_decode($var, ENT_QUOTES);
    }

    /**
     * Returns table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        return Str::camelToSnake(self::getClassName());
    }
}
