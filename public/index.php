<?php
/**
 * Justify Framework
 *
 * @author Justify <justifydev@gmail.com>
 * @version 2.4.0
 */

// Absolute path to framework root directory
define('BASE_DIR', __DIR__ . '/..');

// Includes composer
require_once BASE_DIR . '/vendor/autoload.php';

// Includes settings
$settings = require_once BASE_DIR . '/config/config.php';

// Initials new Application and runs
(new Core\Bootstrap\App($settings))->run();
