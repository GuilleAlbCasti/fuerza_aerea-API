<?php

require_once 'libs/router.php';
require_once 'app/controllers/task.api.controller.php';

// TODO: Incluir controllers

$router = new Router();

$router->addRoute('API/fuerza_aerea-API/api/aviones', 'GET', 'UserApicontroller', 'getAll');
$router->addRoute('API/fuerza_aerea-API/api/avion/:id', 'GET', 'UserApicontroller', 'get');

//$router->route($_GET['response'], $_REQUEST['REQUEST_METHOD']);
$router->route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
