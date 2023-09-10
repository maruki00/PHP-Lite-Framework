<?php

namespace Core;

use Core\Exceptions\MainException;
use Core\Helpers\Json;
use Core\Requests\Request;
use Core\Response\Response;
use Core\Router\RouteItem;

class App
{
    protected static array $routes = [];
    protected RouteItem $currentRoute;
    protected array $data;
    protected array $params;



    public function __construct(){}


    private function getUrl():void
    {
        $uri = preg_replace('#(/)+#', '/', $_SERVER['REQUEST_URI']);
    }
    public final function run():void
    {

        dd(self::$routes);
        $input = file_get_contents('php://input');
        $this->data = Json::decode($input) ?? [];
    }
}