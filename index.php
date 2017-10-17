<?php
/**
 * Justify Framework
 *
 * @version 1.1
 * @author Justify <justifydev@gmail.com>
 */

ob_start();
session_start();

define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/composer/vendor/autoload.php';
require_once BASE_DIR . '/framework/justify/Justify.php';
$settings = require_once CONFIG_DIR . '/settings.php';

$app = new justify\framework\App($settings);
$app->run();
