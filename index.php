<?php
/**
 * Justify Framework
 * @version 0.1g
 * @author Justify <justifydev@gmail.com>
 */
use justify\framework\core\Router;

ob_start();
session_start();

define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/starter.php';

Router::run();
