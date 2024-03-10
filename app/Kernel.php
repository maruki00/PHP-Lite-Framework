<?php

namespace App;

use Core\App;

if (!function_exists('app')){
    function app(string $key){
        global $app;

        return $app->getItem($key);
    }
}

$app = new App;


return $app;
