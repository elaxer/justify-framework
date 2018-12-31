<?php
use Core\Components\Lang;
?>
<div id="open-panel">&laquo;</div>
<div id="close-panel">&raquo;</div>
<div id="panel">
    <span id="phpversion"><?= Lang::get('debugbar.php_version') ?>: <?= phpversion() ?></span>
    <span id="time"><?= Lang::get('debugbar.time') ?>: <?= round(Justify::$execTime, Justify::EXEC_TIME_PRECISION) ?>s</span>
    <span id="app"><?= Lang::get('debugbar.controller') ?>: <?= Justify::$controller ?></span>
    <span id="action"><?= Lang::get('debugbar.action') ?>: <?= Justify::$action ?></span>
</div>