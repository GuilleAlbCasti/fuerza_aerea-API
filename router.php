<?php

require_once 'libs/router.php';
require_once 'app/controllers/task.api.controller.php';

$router = new Router();

$router->addRoute('aviones', 'GET', 'UserApiController', 'getAll');
$router->addRoute('avion/:id', 'GET', 'UserApiController', 'get');

$router->route($_GET['response'], $_REQUEST['REQUEST_METHOD']);
