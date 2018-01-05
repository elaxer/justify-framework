<?php
/**
 * Justify Framework
 *
 * @author Justify <justifydev@gmail.com>
 * @version 2.0
 */

// Absolute path to framework root directory
define('BASE_DIR', getcwd());

// Includes composer
require_once BASE_DIR . '/vendor/composer/vendor/autoload.php';

// Includes Justify class
require_once BASE_DIR . '/vendor/justify/Justify.php';

// Includes App class
require_once BASE_DIR . '/vendor/App.php';

// Includes settings
$settings = require_once BASE_DIR . '/config/settings.php';

// Initials new Application
(new Justify\Core\App($settings))->run();
