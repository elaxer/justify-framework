<?php
$db = require BASE_DIR . '/config/db.php';
$html = require BASE_DIR . '/config/html.php';

$settings = array(
    'timezone' => 'America/Los_Angeles', //Choose your timezone, more information you can find in http://php.net/manual/en/timezones.php
    'debug' => true, //Debug mode; Recommend to set false value in production
    'admin_email' => 'admin@example.com', //Default email to get messages
    'apps' => array( //Active apps
        'index',
    ),

    'db' => $db, //Data base options
    'html' => $html //HTML page options
);

return $settings;
