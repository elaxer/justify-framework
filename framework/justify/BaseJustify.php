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
     * Property stores array of settings in file config/settings.php
     *
     * @var array
     * @access public
     * @static
     */
    public static $settings;

    /**
     * Autoload method
     *
     * @param string $className class name
     */
    public static function autoload($className)
    {
        global $settings;

        $segments = explode('\\', $className);
        $class = array_pop($segments);
        $namespace = implode('\\', $segments);

        if (array_key_exists($namespace, $settings['aliases'])) {
            $path = BASE_DIR . DIRECTORY_SEPARATOR . $settings['aliases'][$namespace] . DIRECTORY_SEPARATOR . $class . '.php';
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
        return '1.1';
    }
}
