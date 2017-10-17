<?php

namespace justify\framework\system;

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
        global $settings;
        global $start;
        $execTime = (microtime(true) - $start);
        define('EXEC_TIME', round($execTime, 5));

        if ($settings['debug'] === true):
            ?>
            <div id="open-panel">
                &laquo;
            </div>
            <div id="close-panel">
                &raquo;
            </div>
            <div id="panel">
                <span id="phpversion">PHP version: <?= phpversion() ?></span>
                <span id="time">Time: <?= EXEC_TIME ?>s</span>
                <span id="app">App: <?= ACTIVE_APP ?></span>
                <span id="action">Action: <?= ACTION_NAME ?></span>
            </div>
            <?php
        endif;
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
