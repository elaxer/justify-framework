<?php

namespace Justify\System;

use Justify;

/**
 * Class stores necessary methods for HTML files
 */
class Html
{
    /**
     * Method displays debugging panel in HTML files
     *
     * To deactivate panel change property "debug" to false in file config/settings.php
     *
     * @access public
     * @static
     * @return void
     */
    public static function debuggingPanel()
    {
        Justify::$execTime = round(microtime(true) - Justify::$startTime, 5);
        if (Justify::$settings['debug'] === true){
            require_once BASE_DIR . '/framework/system/templates/debuggin_panel.php';
        }
    }

    /**
     * Method return encoded variable
     *
     * Returns variable safe to display in HTML file
     *
     * @access public
     * @static
     * @param mixed $var variable to encode
     * @return string
     */
    public static function encode($var)
    {
        return htmlspecialchars(trim($var));
    }

    /**
     * Method return decoded variable
     *
     * Warning!
     * Returns variable unsafe to display in HTML file
     *
     * @access public
     * @static
     * @param mixed $var variable to decode
     * @return string
     */
    public static function decode($var)
    {
        return htmlspecialchars_decode($var);
    }
}
