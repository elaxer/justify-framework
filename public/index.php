<?php
/**
 * Justify Framework
 *
 * @author Justify <justifydev@gmail.com>
 * @version 2.4.3-dev
 */

// Absolute path to project's root directory
define('BASE_DIR', __DIR__ . '/..');

// Includes composer
require_once BASE_DIR . '/vendor/autoload.php';

// Includes settings
$config = require_once BASE_DIR . '/config.php';

// Initials new Application and runs
(new Core\Bootstrap\App($config))->run();
