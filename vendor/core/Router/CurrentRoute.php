<?php

namespace Core\Router;

use Core\App;
use Core\Controller\ErrorController;
use Core\Requests\Request;

class CurrentRoute extends App
{

    private static function getPattern(string $url):string
    {
        $url = explode('/', trim($url,'/'));
        if(is_array($url)){
            foreach ($url as $key => $value) {
                if(empty($url[$key]))
                {
                    unset($url[$key]);
                }
                else
                {
                    $url[$key] = preg_replace('#^\{(.)+\}$#', '(.)+', $value);
                }
            }
        }
        $url = implode('/', $url);
        return $url[0] ===' /'?$url : "/$url";
    }

    public static final function current(array $routes, string $requestUri):?RouteItem
    {
        foreach(self::$routes as $key => $route)
        {
            $pattern = self::getPattern($route->getRoute());
            if(preg_match("#^$pattern$#", $requestUri))
            {
                $route->params((new Request)->all());
                return $route;
            }
        }
        return (new RouteItem())->controller(ErrorController::class)->action("error");
    }
}