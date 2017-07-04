<?php

namespace Barware\Actions;

class PrivacyPolicies
{    
    function __invoke($name)
    {
        $filename = dirname(__DIR__) . "/views/barware/{$name}.html";
        var_dump($filename);die;
        return file_get_contents($filename);
    }
}
