<?php ## Routes of application

$router = router();

$router->route('GET', '/', 'IndexController@index');
