<?php

require_once 'libs/router.php';
require_once 'app/controllers/task.api.controller.php';

// TODO: Incluir controllers

// En router.php
$resource = $_GET['resource'] ?? null;  // Esto captura 'aviones'
$query = $_SERVER['QUERY_STRING'];      // Esto captura 'origen=Brasil'

var_dump($resource);  // Muestra 'aviones'
var_dump($query);     // Muestra 'origen=Brasil'


$router = new Router();

$router->addRoute('aviones', 'GET', 'UserApiController', 'getAll');
$router->addRoute('avion/:id', 'GET', 'UserApiController', 'get');

$router->setDefaultRoute('ErrorController', 'notFound');

//$router->route($_GET['response'], $_REQUEST['REQUEST_METHOD']);
//$url = str_replace('/API/fuerza_aerea-API/api/', '', $_SERVER['REQUEST_URI']);
$parsedUrl = parse_url($_SERVER['REQUEST_URI']);
$url = trim($parsedUrl['path'], '/');

$router->route($url, $_SERVER['REQUEST_METHOD']);
echo ('$_SERVER["REQUEST_URI"]= '.$_SERVER['REQUEST_URI']);
echo ('$_SERVER["REQUEST_METHOD"]= '.$_SERVER['REQUEST_METHOD']);

