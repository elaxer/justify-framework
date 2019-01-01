<?php ## Routes of application

$router = new \Core\System\Router\Router();

$router->route('GET', '/', 'IndexController@index');

return $router;
