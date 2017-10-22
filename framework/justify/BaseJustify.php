<?php

class BaseJustify
{
    /**
     * Property stores array of loaded modules
     *
     * @var array
     * @access public
     * @static
     */
    public static $loadedModules;


    /**
     * Autoload method
     *
     * @param string $className class name
     */
    public static function autoload($className)
    {
        $className = preg_replace('/justify\\\\/', '', $className);
        $path = BASE_DIR . '/' . $className . '.php';
        $path = str_replace('\\', '/', $path);

        require_once $path;
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
        return '1.1';
    }

    /**
     * Method define necessary constants
     *
     * @access public
     * @static
     * @return void
     */
    public static function defineConstants()
    {
        define('CONFIG_DIR', BASE_DIR . '/config');
        define('APPS_DIR', BASE_DIR . '/apps');
        define('VIEWS_DIR', BASE_DIR . '/views');
        define('TEMPLATES_DIR', VIEWS_DIR . '/templates');
    }

    /**
     * Method load necessary modules for framework
     *
     * @access public
     * @static
     * @return void
     */
    public static function loadModules()
    {
        self::$loadedModules = glob(BASE_DIR . '/framework/modules/*.module.php');
        foreach (self::$loadedModules as $module) {
            require_once $module;
        }
    }

}
