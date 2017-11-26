<?php
//Include other settings
$apps = require_once BASE_DIR . '/config/apps.php';
$db = require_once BASE_DIR . '/config/db.php';

//Main array with all settings
$settings = [
    'timezone' => 'America/Los_Angeles', //Choose your timezone, more information you can find in http://php.net/manual/en/timezones.php
    'debug' => true, //Debug mode; Recommend to set false value in production
    'homeURL' => '/', //URL to home page
    'template' => 'main', //Base template for HTML page
    'webPath' => '/web/', //Base URL to web components
    '404page' => '404/404.php', //Path to page on which the redirect will be sent on error 404
    'html' => [ //HTML page options
        'lang' => 'en', //HTML language
        'charset' => 'UTF-8', //HTML charset
    ],
    'components' => [ //Components for HTML page
        'css' => [ //Links to CSS files
            'libs/bootstrap/bootstrap.min.css',
            'css/main.css',
            'css/adaptive.css'
        ],
        'js' => [ //Links to JS files
            'libs/jquery/jquery-3.2.1.min.js',
            'libs/bootstrap/bootstrap.min.js',
            'js/debug_panel.js'
        ],
    ],
    'apps' => $apps, //Active apps
    'db' => $db //Data base options
];

return $settings;
