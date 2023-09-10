<?php
namespace Core\Router;

use Core\App;
use Core\Controller\ErrorController;
use Core\Exceptions\MainException;
use Core\Http\Server;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ItemNotFoundException;

class Router extends App
{
    private static RouteItem $item;
    
    private  static function add(string $method, string $route, callable|string|array $controller, array $middlwares=[])
    {
        self::$item = new RouteItem();
        [$controller, $action] = ControllerParse::parse($controller);
        match($action){
            is_null($action) => self::$item->callback($controller),
            default => self::$item->action($action)->controller($controller),
        };
        self::$item->method($method)->middlwares($middlwares)->route($route)->prefix('');
        self::$routes[] = self::$item;
    }

    public static final function get(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('GET', $route, $controller, $middlwares);
    }

    public static final function post(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('POST', $route, $controller, $middlwares);
    }

    public static final function options(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('OPTIONS', $route, $controller, $middlwares);
    }

    public static final function delete(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('DELETE', $route, $controller, $middlwares);
    }

    public static final function put(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('PUT', $route, $controller, $middlwares);
    }

    public static final function patch(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('PATCH', $route, $controller, $middlwares);
    }

    public static final function trace(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('TRACE', $route, $controller, $middlwares);
    }

    public static final function connect(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('CONNECT', $route, $controller, $middlwares);
    }

    public static final function head(string $route, callable|string|array $controller, array $middlwares=[]):void
    {
        self::add('HEAD', $route, $controller, $middlwares);
    }
}