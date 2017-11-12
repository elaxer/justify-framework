<div id="open-panel">&laquo;</div>
<div id="close-panel">&raquo;</div>
<div id="panel">
    <span id="phpversion">PHP version: <?= phpversion() ?></span>
    <span id="time">Time: <?= round(Justify::$execTime, Justify::EXEC_TIME_PRECISION) ?>s</span>
    <span id="app">App: <?= Justify::$app ?></span>
    <span id="action">Action: <?= Justify::$action ?></span>
</div>