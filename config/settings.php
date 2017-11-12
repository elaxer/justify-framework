<?php
//Include other settings
$apps = require_once CONFIG_DIR . '/apps.php';
$db = require_once CONFIG_DIR . '/db.php';

//Main array with all settings
$settings = [
    'aliases' => [
        'App\Index' => 'apps/index',
    ],
    'timezone' => 'America/Los_Angeles', //Choose your timezone, more information you can find in http://php.net/manual/en/timezones.php
    'debug' => true, //Debug mode; Recommend to set false value in production
    'template' => 'main', //Base template for HTML page
    'fileExtension' => '.php', //Base file extension
    '404page' => '404/404.php', //Path to page on which the redirect will be sent on error 404
    'html' => [ //HTML page options
        'lang' => 'en', //HTML language
        'charset' => 'UTF-8', //HTML charset
    ],
    'apps' => $apps, //Active apps
    'db' => $db //Data base options
];

return $settings;
