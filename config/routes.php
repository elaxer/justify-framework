<?php ## Routes of application

$router = new \Core\Components\Router\Router();

$router->route('GET', '/', 'IndexController@index');

return $router;
