<?php

/**
 * Class Justify
 *
 * Core class of framework
 */
class Justify
{
    /**
     * Count of characters after comma in $execTime
     * @deprecated
     */
    const EXEC_TIME_PRECISION = 5;

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
     * Stores aliases of namespaces
     *
     * Key - namespace
     * Value - path to directory
     *
     * @var array
     */
    public static $classesMap = [
        'Justify\Components' => 'core/components',
        'Justify\Widgets' => 'core/widgets',
        'Justify\System' => 'core/system',
        'Justify\Bootstrap' => 'core/bootstrap',
        'Justify\Exceptions' => 'core/system/exceptions',
        'Justify\System\TemplateEngines' => 'core/system/templateEngines',
        'App\Controllers' => 'app/controllers',
        'App\Models' => 'app/models'
    ];

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
     * Autoload method
     *
     * @param string $className class name
     */
    public static function autoloadFunction(string $className)
    {
        $segments = explode('\\', $className);
        $class = array_pop($segments);
        $namespace = implode('\\', $segments);
        $path = BASE_DIR . '/' . Justify::$classesMap[$namespace] . '/' . $class . '.php';

        if (array_key_exists($namespace, Justify::$classesMap)) {
            require_once $path;
        } else if (file_exists($path)) {
            require_once $path;
        }
    }

    /**
     * Returns current framework version
     *
     * @return string
     */
    public static function getVersion(): string
    {
        return '2.3.0';
    }
}
