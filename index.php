<?php
/**
 * Justify Framework
 *
 * @author Justify <justifydev@gmail.com>
 * @version 1.1
 */
define('BASE_DIR', getcwd());
define('CONFIG_DIR', BASE_DIR . '/config');
define('APPS_DIR', BASE_DIR . '/apps');
define('VIEWS_DIR', BASE_DIR . '/views');
define('TEMPLATES_DIR', VIEWS_DIR . '/templates');

require_once BASE_DIR . '/framework/composer/vendor/autoload.php';
require_once BASE_DIR . '/framework/justify/Justify.php';
$settings = require_once CONFIG_DIR . '/settings.php';

spl_autoload_register(['Justify', 'autoload']);

(new Justify\Core\App($settings))->run();
