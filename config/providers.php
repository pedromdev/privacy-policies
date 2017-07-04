<?php

return [
    [
        'register' => new Silex\Provider\MonologServiceProvider(),
        'options' => [
            'monolog.logfile' => 'php://stderr',
        ],
    ],
    [
        'register' => new Silex\Provider\TwigServiceProvider(),
        'options' => [
            'twig.path' => dirname(__DIR__) . '/views'
        ],
    ],
];
