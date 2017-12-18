<?php
/**
 * Justify Framework
 *
 * @author Justify <justifydev@gmail.com>
 * @version 1.6.1
 */
define('BASE_DIR', getcwd());

require_once BASE_DIR . '/vendor/composer/vendor/autoload.php';
require_once BASE_DIR . '/vendor/justify/Justify.php';
$settings = require_once BASE_DIR . '/config/settings.php';

spl_autoload_register(['Justify', 'autoload']);

(new Justify\Core\App($settings))->run();
