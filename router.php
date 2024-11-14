<?php

require_once 'libs/router.php';
require_once 'app/controllers/task.api.controller.php';

// TODO: Incluir controllers

$router = new Router();

$router->addRoute('aviones', 'GET', 'getApiAviones', 'getAll');
$router->addRoute('avion/:id', 'GET', 'getApiAvion', 'get');

//$router->route($_GET['response'], $_REQUEST['REQUEST_METHOD']);
$router->route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
