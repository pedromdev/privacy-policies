<?php

return [
    [
        'url' => '/barware/{name}',
        'method' => 'get',
        'handler' => new \Barware\Actions\PrivacyPolicies(),
    ],
];
