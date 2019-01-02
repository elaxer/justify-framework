<?php

// Includes other settings
$db = require_once BASE_DIR . '/config/db.php';
$routes = require_once BASE_DIR . '/config/routes.php';

// Main array with all settings
$config = [
    // Choose your timezone, all list of time zones 
    // you can find in http://php.net/manual/en/timezones.php
    'timezone' => 'UTC',

    // Application locale
    'locale' => 'en',

    // Uses then main locale don't working
    'fallbackLocale' => 'ru',

    // Debug mode; Set false value in production
    'debug' => true,

    // Set true to protect your forms from CSRF attacks
    'CSRFProtection' => true,

    // Home page url
    'homeURL' => '/',

    // Base template for HTML page
    'template' => 'main',

    // Base URL to web components
    'webPath' => '/web/',

    // Path to page on which the redirect will be sent on error 404
    '404page' => '404.php',

    // HTML page options
    'html' => [
        // HTML language
        'lang' => 'en',

        // HTML charset
        'charset' => 'UTF-8'
    ],

    // Data base options
    'db' => $db,

    // Routes of application
    'router' => $routes,

    // Active template engine
    'template_engine' => 'PHP',

    // List of config of template engines
    'template_engines' => [
        'PHP' => [
            'file_extension' => 'php'
        ],

        'Twig' => [
            'file_extension' => 'twig',
            'config' => [
                'cache' => BASE_DIR . '/store/cache/twig',
                'debug' => true
            ]
        ],

        'Smarty' => [
            'file_extension' => 'php',
            'config' => [
                'cache_dir' => BASE_DIR . '/store/cache/smarty',
                'compile_dir' => BASE_DIR . '/store/compiled/smarty',
                'debugging' => true
            ]
        ]
    ],

    'caching' => [
        'driver' => 'memcached',

        'memcached' => [
            'host' => '127.0.0.1',
            'port' => 11211
        ]
    ]
];

return $config;
