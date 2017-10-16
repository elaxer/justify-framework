<?php
//Include other settings
$apps = require_once CONFIG_DIR . '/apps.php';
$db = require_once CONFIG_DIR . '/db.php';
$html = require_once CONFIG_DIR . '/html.php';

//Main array with all settings
$settings = [
    'timezone' => 'America/Los_Angeles', //Choose your timezone, more information you can find in http://php.net/manual/en/timezones.php
    'debug' => true, //Debug mode; Recommend to set false value in production
    'template' => 'main', //Base template for HTML page
    '404page' => '404/404.php', //Path to page on which the redirect will be sent on error 404
    'apps' => $apps, //Active apps
    'db' => $db, //Data base options
    'html' => $html //HTML page options
];

return $settings;
