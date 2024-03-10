
<?php


if (!function_exists('app')){
    function app(string $key){
        global $app;
        return $app->getItem($key);
    }
}

