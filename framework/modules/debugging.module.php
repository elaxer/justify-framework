<?php

namespace justify\framework\modules;

class Debug
{
    /**
     * Method displays debugging panel in html file
     *
     * To deactivate panel change property "debug" to false in file config/settings.php
     *
     * @return void
     * @static
     */
    public static function debuggingPanel()
    {
        global $settings;
        if ($settings['debug'] === true):
            $startTime = $GLOBALS['start'];
            $execTime = (microtime(true) - $startTime);
            define('EXEC_TIME', round($execTime, 5));
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
}
