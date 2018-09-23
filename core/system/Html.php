<?php

namespace Core\System;

use Core\Justify;

/**
 * Class Html
 *
 * Class stores necessary methods for HTML files
 *
 * @package Justify\System
 */
class Html extends BaseObject
{
    /**
     * Method displays debugging panel in HTML files
     *
     * To deactivate panel change property "debug" to false in file config/settings.php
     *
     * @deprecated
     * @return string|bool
     */
    public static function debuggingPanel()
    {
        Justify::$execTime = microtime(true) - Justify::$startTime;

        if (Justify::$debug) {
            ob_start();

            require_once BASE_DIR . '/core/system/templates/debug_panel.php';

            $panel = ob_get_contents();
            ob_end_clean();

            return $panel;
        }

        return false;
    }

    /**
     * Method displays head in html file
     *
     * @deprecated
     * @return string
     */
    public static function head(): string
    {
        ob_start();

        require_once BASE_DIR . '/core/system/templates/head.php';

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * Method return encoded variable
     *
     * Returns variable safe to display in HTML file
     *
     * @deprecated
     * @param mixed $var variable to encode
     * @return string
     */
    public static function encode($var): string
    {
        return htmlspecialchars(trim($var), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Method return decoded variable
     *
     * Warning!
     * Returns variable unsafe to display in HTML file
     *
     * @deprecated
     * @param mixed $var variable to decode
     * @return string
     */
    public static function decode($var): string
    {
        return htmlspecialchars_decode($var, ENT_QUOTES);
    }
}
