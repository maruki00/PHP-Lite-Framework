<?php

namespace Core;

use Core\Helpers\Json;

class App
{
    protected array $routes;
    public function __construct(){}

    private function parseRoute():string
    {
        return '';
    }

    private function parseUrl()
    {
        $uri = preg_replace('#(/)+#', '/', $_SERVER['REQUEST_URI']);
    }
    public final function run():void
    {
        echo env('LS', '---'). '<br/>';
        $input = file_get_contents('php://input');
        var_dump(Json::decode($input));
    }
}