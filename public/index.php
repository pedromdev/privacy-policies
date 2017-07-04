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

    $app->$routeMethod($route['url'], function(Application $app, Request $request, $arg = null, ...$args) use($route) {
        $params = [];
        $routeHandler = $route['handler'];
        $funcArgs = array_slice(func_get_args(), 2);
        preg_match_all('/\{([a-z0-9._-]+)\}/', $route['url'], $routeParams);
        $j = 0;

        if (!empty($routeParams)) {
            $count = count($routeParams);

            for ($i = 1; $i < $count; $i += 2) {
                $params[$routeParams[$i][0]] = $funcArgs[$j++];
            }
        }
        var_dump($routeParams);
        var_dump($funcArgs);
        var_dump($params);die;
        return call_user_func($routeHandler, $app, $request, $params);
    });
}

$app->run();
