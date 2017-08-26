<?php
//Justify Framework
$start = microtime(true);
define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/starter.php';

$app = new Justify;
$app->run();
