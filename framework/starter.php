<?php
$modules = glob(BASE_DIR . '/framework/modules/*.module.php');
foreach ($modules as $module) {
    require_once $module;
}

require_once BASE_DIR . '/framework/core/bootstrap.php';

require_once BASE_DIR . '/framework/core/system/controller.php';
require_once BASE_DIR . '/framework/core/system/model.php';
require_once BASE_DIR . '/framework/core/system/view.php';

if (file_exists(BASE_DIR . '/framework/core/composer/vendor/autoload.php')) {
    require_once BASE_DIR . '/framework/core/composer/vendor/autoload.php';
}
