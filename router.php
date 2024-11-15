<?php

require_once 'libs/router.php';
require_once 'app/controllers/task.api.controller.php';

// TODO: Incluir controllers

$router = new Router();

$router->addRoute('aviones', 'GET', 'UserApicontroller', 'getAll');
$router->addRoute('avion/:id', 'GET', 'UserApicontroller', 'get');

$router->setDefaultRoute('ErrorController', 'notFound');

//$router->route($_GET['response'], $_REQUEST['REQUEST_METHOD']);
$url = str_replace('/API/fuerza_aerea-API/api/', '', $_SERVER['REQUEST_URI']);
$router->route($url, $_SERVER['REQUEST_METHOD']);
echo ('$_SERVER["REQUEST_URI"]= '.$_SERVER['REQUEST_URI']);

