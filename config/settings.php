<?php

// Includes other settings
$db = require_once BASE_DIR . '/config/db.php';
$web = require_once BASE_DIR . '/config/web.php';
$routes = require_once BASE_DIR . '/config/routes.php';

// Main array with all settings
$settings = [
    // Choose your timezone, all list of time zones 
    // you can find in http://php.net/manual/en/timezones.php
    'timezone' => 'America/Los_Angeles',

    // Application locale
    'locale' => 'en',

    // Debug mode; Recommend to set false value in production
    'debug' => true,

    // Home page url
    'homeURL' => '/',

    // Base template for HTML page
    'template' => 'main',

    // Base URL to web components
    'webPath' => '/web/',

    // Path to page on which the redirect will be sent on error 404
    '404page' => '404/404.php',

    // HTML page options
    'html' => [
        // HTML language
        'lang' => 'en',

        // HTML charset
        'charset' => 'UTF-8'
    ],

    // Web components
    'web' => $web,

    // Data base options
    'db' => $db,

    // Routes of application
    'routes' => $routes
];

return $settings;
