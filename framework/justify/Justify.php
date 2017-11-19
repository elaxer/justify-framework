<?php

class Justify
{
    /**
     * Count of characters after comma in $execTime
     */
    const EXEC_TIME_PRECISION = 5;

    /**
     * Property stores array of settings in file config/settings.php
     *
     * @var array
     * @access public
     * @static
     */
    public static $settings;

    /**
     * Debug mode
     *
     * You can change value in file config/settings.php
     *
     * @access public
     * @static
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
     * @access public
     * @static
     * @var array
     */
    public static $aliases = [
        'Justify\Modules' => 'framework/modules',
        'Justify\System' => 'framework/system',
        'Justify\Core' => 'framework',
        'Justify\Exceptions' => 'framework/system/exceptions'
    ];

    /**
     * Stores name of current application
     *
     * @access public
     * @static
     * @var string
     */
    public static $app;

    /**
     * Stores name of current action
     *
     * @access public
     * @static
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
     * Autoload method
     *
     * @param string $className class name
     */
    public static function autoload($className)
    {
        $segments = explode('\\', $className);
        $class = array_pop($segments);
        $namespace = implode('\\', $segments);

        if (array_key_exists($namespace, Justify::$aliases)) {
            $path = BASE_DIR
                . DIRECTORY_SEPARATOR
                . Justify::$aliases[$namespace]
                . DIRECTORY_SEPARATOR
                . $class
                . '.php';

            require_once $path;
        }
    }

    /**
     * Returns current framework version
     *
     * @access public
     * @static
     * @return string
     */
    public static function getVersion()
    {
        return '1.3';
    }

    /**
     * Justify constructor
     *
     * Initialize necessary things
     *
     * @access public
     * @param array $settings
     */
    public function __construct($settings)
    {
        Justify::$settings = $settings;

        Justify::$startTime = microtime(true);

        Justify::$debug = Justify::$settings['debug'];
        Justify::$home = Justify::$settings['homeURL'];
        Justify::$lang = Justify::$settings['html']['lang'];
        Justify::$charset = Justify::$settings['html']['charset'];
        Justify::$web = Justify::$settings['webPath'];
    }
}
