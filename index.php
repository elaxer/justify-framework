<?php
/**
 * Justify Framework
 *
 * @version 1.1
 * @author Justify <justifydev@gmail.com>
 */
define('BASE_DIR', getcwd());

require_once BASE_DIR . '/framework/composer/vendor/autoload.php';
require_once BASE_DIR . '/framework/justify/Justify.php';
$settings = require_once CONFIG_DIR . '/settings.php';

(new justify\framework\App($settings))->run();
