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
     * Stores aliases of namespaces
     *
     * @access public
     * @static
     * @var array
     */
    public static $aliases = [
        'Justify\Modules' => 'framework/modules',
        'Justify\System' => 'framework/system',
        'Justify\Core' => 'framework'
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
        return '1.2';
    }
}
