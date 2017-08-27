<?php
return array(
    'timezone' => '', //choose your timezone, more information you can find in http://php.net/manual/en/timezones.php
    'debug' => true, //debug mode
    'admin_email' => 'admin@example.com',
    'apps' => array( //active apps
        'index',
    ),

    'db' => array( //data base options
        'host' => '127.0.0.1', //Data base host
        'user' => 'root', //Data base user name
        'password' => '123456',   //User password
        'name' => 'framework', //Data base name
        'charset' => 'utf8', //Data base charset
    ),
    'html' => array(
        'replace_by_default' => true, //If replace_by_default equals "true" then meta tags and title will be replaced by default values if this values empty
        'lang' => 'en', //HTML language
        'charset' => 'UTF-8', //HTML charset
        'title' => 'Justify Framework', //Default HTML meta tag title
        'description' => 'Made with Justify Framework', //Default HTML meta tag description
        'author' => 'Justify', //Default HTML meta tag author
        'keywords' => 'Justify, framework, engine, site, hmtv, apps', //Default HTML meta tag keywords
    ),
);
