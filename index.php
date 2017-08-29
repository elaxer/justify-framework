<?php
//Justify Framework
ob_start();
session_start();

define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/starter.php';

$app = new Justify;
$app->run();
