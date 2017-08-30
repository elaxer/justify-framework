<?php
//Justify Framework
ob_start();
session_start();

use framework\core\Router;

define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/starter.php';

$app = new Router;
$app->run();
