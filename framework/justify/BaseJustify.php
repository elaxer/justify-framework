<?php

class BaseJustify
{
    public static $loadedModules;

    public static function autoload($className)
    {
        $className = preg_replace('#justify#', '', $className);
        $path = BASE_DIR . '/' . $className . '.php';
        $path = str_replace('\\', '/', $path);

        require_once $path;
    }

    public static function getVersion()
    {
        return '1.1';
    }

    public static function defineConstants()
    {
        define('CONFIG_DIR', BASE_DIR . '/config');
        define('APPS_DIR', BASE_DIR . '/apps');
        define('VIEWS_DIR', BASE_DIR . '/views');
        define('TEMPLATES_DIR', VIEWS_DIR . '/templates');
    }

    public static function loadModules()
    {
        self::$loadedModules = glob(BASE_DIR . '/framework/modules/*.module.php');
        foreach (self::$loadedModules as $module) {
            require_once $module;
        }
    }

}
