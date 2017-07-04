<?php

namespace Barware\Actions;

use Symfony\Component\HttpFoundation\Response;

class PrivacyPolicies
{    
    function __invoke($name)
    {
        $filename = dirname(__DIR__) . "/views/barware/{$name}.html";

        if (!is_file($filename)) {
            return new Response("Privacy policy not found", 404);
        }
        $html = file_get_contents($filename);
        var_dump($html);die;
    }
}
