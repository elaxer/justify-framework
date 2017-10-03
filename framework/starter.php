<?php
//Loads requires files
$start = microtime(true);

//Defines constants
define('APPS_DIR', BASE_DIR . '/apps');
define('VIEWS_DIR', BASE_DIR . '/views');

$settings = require_once BASE_DIR . '/config/settings.php';

//Loads autoload function
if (file_exists(BASE_DIR . '/framework/core/composer/vendor/autoload.php')) {
    require_once BASE_DIR . '/framework/core/composer/vendor/autoload.php';
}

//Loads modules
$modules = glob(BASE_DIR . '/framework/modules/*.module.php');
foreach ($modules as $module) {
    require_once $module;
}
