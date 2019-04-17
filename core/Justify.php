<?php

namespace Core;

/**
 * Class Justify
 *
 * Core class of framework
 */
class Justify
{
    /**
     * @var \Core\Bootstrap\App
     */
    public static $app;

    /**
     * Stores require minimal version of PHP
     *
     * @var string
     */
    public static $minimalPHPVersion = '7.0.0';

    /**
     * Returns current framework version
     *
     * @return string
     */
    public static function getVersion()
    {
        return '2.4.3-dev';
    }
}
