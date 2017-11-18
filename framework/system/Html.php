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
        Justify::$execTime = microtime(true) - Justify::$startTime;

        if (Justify::$settings['debug']){
            ob_start();

            require_once BASE_DIR . '/framework/system/templates/debug_panel.php';

            $panel = ob_get_contents();
            ob_end_clean();

            return $panel;
        }
    }

    public static function components()
    {
        foreach (Justify::$settings['components']['js'] as $js) {
            echo "<script src=\"$js\"></script>\n";
        }
        foreach (Justify::$settings['components']['css'] as $css) {
            echo "<link rel=\"stylesheet\" href=\"$css\">\n";
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
