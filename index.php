<?php
/**
 * Justify Framework
 *
 * @version 1.0
 * @author Justify <justifydev@gmail.com>
 */

ob_start();
session_start();

define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/starter.php';

$app = new justify\framework\core\Router;
$app->run();
