<?php
function dump($variable, $exit = false, $text = false) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';

    if ($exit) {
        die($text);
    }
}

function debugging_panel()
{
    $settings = require BASE_DIR . '/settings.php';
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
