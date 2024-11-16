<?php

require_once 'libs/router.php';
require_once 'app/controllers/task.api.controller.php';

// TODO: Incluir controllers

$router = new Router();

$router->addRoute('aviones', 'GET', 'UserApicontroller', 'getAll');
$router->addRoute('avion/:id', 'GET', 'UserApicontroller', 'get');

//$router->route($_GET['response'], $_REQUEST['REQUEST_METHOD']);
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
