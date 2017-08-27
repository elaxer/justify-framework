<?php
function debugging_panel()
{
    $settings = require BASE_DIR . '/settings.php';
    if ($settings['debug'] === true):
        $startTime = $GLOBALS['start'];
        $execTime = (microtime(true) - $startTime);
        define('EXEC_TIME', round($execTime, 5));
        ?>
        <div id="open-panel">
            <
        </div>
        <div id="close-panel">
            >
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
