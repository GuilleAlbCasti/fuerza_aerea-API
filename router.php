<?php

require_once 'libs/router.php';
require_once 'app/controllers/task.api.controller.php';

$router = new Router();

$router->addRoute('aviones', 'GET', 'UserApiController', 'getAll');
$router->addRoute('avion/:id', 'GET', 'UserApiController', 'get');
$router->addRoute('aviones', 'POST', 'UserApiController', 'create');
$router->addRoute('avion/:id', 'PUT', 'UserApiController', 'update');
$router->addRoute('avion/:id', 'DELETE', 'UserApiController', 'delete');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
