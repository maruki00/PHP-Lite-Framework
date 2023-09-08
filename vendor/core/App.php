<?php

namespace Core;

class App
{
    protected array $routes;
    public function __construct(){
        dd(1234);
    }

    private function parseRoute():string
    {

        return '';
    }

    public final function run():void
    {
        $input = file_get_contents('http://input');
        var_dump($input);
    }
}