<?php

namespace Core;

use Core\Exceptions\MainException;
use Core\Helpers\Json;
use Core\Http\Server;
use Core\Http\Url\UrlParam;
use Core\Logger\LoggerStrategy;
use Core\Router\CurrentRoute;
use JetBrains\PhpStorm\NoReturn;
use ReflectionMethod;

class App
{
    protected static array $routes = [];
    protected array $data;
    protected static array $params;

    public function __construct(){}

    private function getRequestUri():string
    {
        return preg_replace('#(/(\.+)?)+#', '/', $_SERVER['REQUEST_URI']);
    }

    #[NoReturn] public final function run():void
    {
        try{

            $requestUri   = $this->getRequestUri();
            $currentRoute = CurrentRoute::current(self::$routes, $requestUri);

//            if($currentRoute->getHttpMethod() !== Server::get('REQUEST_METHOD'))
//            {
//                die("Invalid HTTP Method");
//            }
            $urlParams = UrlParam::getParams($currentRoute, $requestUri) ?? [];
            $input = file_get_contents('php://input');
            $controller = $currentRoute->getController();
            $action     = $currentRoute->getAction();
            $reflection = new ReflectionMethod($controller, $action);
            dd($reflection);
            //$rawParams = json_decode($input) ?? [];
            //$params    = $_REQUEST ?? [];
            //self::$params = [...$rawParams, ...$urlParams, ...$params];

        }catch (\Exception|MainException $er)
        {
            throw new MainException($er->getMessage());
        }

    }

}