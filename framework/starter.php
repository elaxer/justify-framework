<?php
$start = microtime(true);
if (file_exists(BASE_DIR . '/framework/core/composer/vendor/autoload.php')) {
    require_once BASE_DIR . '/framework/core/composer/vendor/autoload.php';
}

$modules = glob(BASE_DIR . '/framework/modules/*.module.php');
foreach ($modules as $module) {
    require_once $module;
}
