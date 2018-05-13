<?php
/**
 * Justify Framework
 *
 * @author Justify <justifydev@gmail.com>
 * @version 2.2.0
 */

// Absolute path to framework root directory
define('BASE_DIR', dirname(__FILE__));

// Includes composer
require_once BASE_DIR . '/vendor/autoload.php';

// Includes Justify class
require_once BASE_DIR . '/core/Justify.php';

// Includes App class
require_once BASE_DIR . '/core/bootstrap/App.php';

// Includes settings
$settings = require_once BASE_DIR . '/config/settings.php';

// Initials new Application and runs
(new Justify\Bootstrap\App($settings))->run();
