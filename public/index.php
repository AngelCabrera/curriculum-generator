<?php

use WoohooLabs\Harmony\Harmony;
use WoohooLabs\Harmony\Middleware\HttpHandlerRunnerMiddleware;
use WoohooLabs\Harmony\Middleware\DispatcherMiddleware;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require '../config.php';
require '../routes.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    $controller = new App\Controllers\IndexController;
    $response = $controller->getError404Action();
} else {
    $harmony = new Harmony(ServerRequestFactory::fromGlobals(), new Response());
    $harmony
    ->addMiddleware(new HttpHandlerRunnerMiddleware(new SapiEmitter()))
    ->addMiddleware(new Middlewares\AuraRouter($routerContainer))
    ->addMiddleware(new DispatcherMiddleware(null, 'request-handler'))
    ->run();
}

