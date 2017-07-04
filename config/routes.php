<?php

return [
    [
        'url' => '/barware/{name}',
        'method' => 'get',
        'handler' => function($app, $request, $params) {
            $name = $params['name'];
            $filename = dirname(__DIR__) . "/views/barware/{$name}.html";
            return file_get_contents($filename);
        },
    ],
];