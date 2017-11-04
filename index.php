<?php
/**
 * Justify Framework
 *
 * @author Justify <justifydev@gmail.com>
 * @version 1.1
 */
define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/composer/vendor/autoload.php';
require_once BASE_DIR . '/framework/justify/Justify.php';
$settings = require_once CONFIG_DIR . '/settings.php';

(new justify\framework\App($settings))->run();
