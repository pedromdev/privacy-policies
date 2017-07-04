<?php

return [
    [
        'provider' => new Silex\Provider\MonologServiceProvider(),
        'options' => [
            'monolog.logfile' => 'php://stderr',
        ],
    ],
    [
        'provider' => new Silex\Provider\TwigServiceProvider(),
        'options' => [
            'twig.path' => dirname(__DIR__) . '/views'
        ],
    ],
];
