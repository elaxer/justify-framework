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
     * Property stores array of settings in file config/settings.php
     *
     * @static
     */
    public static $settings;

    /**
     * Debug mode
     *
     * You can change value in file config/settings.php
     *
     * @var bool
     */
    public static $debug;

    /**
     * Stores path to home URl
     *
     * You can change value in file config/settings.php in key 'homeURL'
     *
     * @var string
     */
    public static $home;

    /**
     * Stores language of HTML page
     *
     * You can change value in file config/settings.php in key 'lang'
     *
     * @var string
     */
    public static $lang;

    /**
     * Stores charset of HTML page
     *
     * You can change value in file config/settings.php in key 'lang'
     *
     * @var string
     */
    public static $charset;

    /**
     * Stores path to web directory
     *
     * You can change value in file config/settings.php
     *
     * @var string
     */
    public static $web;

    /**
     * Stores name of current controller
     *
     * @var string
     */
    public static $controller;

    /**
     * Stores name of current action
     *
     * @var string
     */
    public static $action;

    /**
     * Stores the start time of the script execution
     *
     * @var float
     */
    public static $startTime;

    /**
     * Stores the execution time of script
     *
     * @var float|null
     */
    public static $execTime;

    /**
     * Stores require minimal version of PHP
     *
     * @var string
     */
    public static $minimalPHPVersion = '7.0.0';

    /**
     * @var \Core\Container
     */
    public static $container;

    /**
     * Returns current framework version
     *
     * @return string
     */
    public static function getVersion()
    {
        return '2.4.2';
    }
}
