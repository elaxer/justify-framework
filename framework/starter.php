<?php
//Define the start time for the script executions
$start = microtime(true);

//Define constants
define('CONFIG_DIR', BASE_DIR . '/config');
define('APPS_DIR', BASE_DIR . '/apps');
define('VIEWS_DIR', BASE_DIR . '/views');

$settings = require_once BASE_DIR . '/config/settings.php';

//Include Composer
require_once BASE_DIR . '/framework/core/composer/vendor/autoload.php';

//Include modules
$modules = glob(BASE_DIR . '/framework/modules/*.module.php');
foreach ($modules as $module) {
    require_once $module;
}
