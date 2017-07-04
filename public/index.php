<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

require('../vendor/autoload.php');

$providers = require('../config/providers.php');
$routes = require('../config/routes.php');

$app = new Application();
$app['debug'] = true;

foreach($providers as $provider) {
    $app->register($provider['provider'], $provider['options']);
}

// Our web handlers

foreach($routes as $route) {
    $routeMethod = $route['method'];

    $app->$routeMethod($route['url'], $route['handler']);
}

$app->run();
