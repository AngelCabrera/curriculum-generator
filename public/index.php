<?php

ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require '../config.php';
require '../routes.php';

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    $controller = new App\Controllers\IndexController;
    $response = $controller->getError404Action();
} else {
    $handlerData = $route->handler;

    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $response = $controller->$actionName($request);
}
echo $response->getBody();
