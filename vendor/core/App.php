<?php

namespace Core;

use App\Http\Kernal;
use App\Http\Kernel;
use Core\Controller\ErrorController;
use Core\Exceptions\MainException;
use Core\Http\Server;
use Core\Http\Url\UrlParam;
use Core\Middleware\Middleware;
use Core\Middleware\MiddlewareFactory;
use Core\Response\Response;
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
        return preg_replace('#(/(\.+)?)+#', '/', Server::get('REQUEST_URI'));
    }

    private function runMiddleware(Middleware $middleware)
    {
        return $middleware->handle();
    }
    #[NoReturn] public final function run():void
    {
        try{
            $requestUri     = $this->getRequestUri();
            $currentRoute   = CurrentRoute::current(self::$routes, $requestUri);
            $urlParams      = UrlParam::getParams($currentRoute, $requestUri) ?? [];
            $controller     = $currentRoute->getController();
            $action         = $currentRoute->getAction();
            if(!class_exists($controller) || !method_exists($controller, $action))
            {
                echo (new ErrorController())->notfound();
                die;
            }
            foreach ($currentRoute->getMiddlwares() as $middleware)
            {
                $middleware = MiddlewareFactory::create($middleware);
                if(!$this->runMiddleware($middleware)){
                    echo (new Response())->json(['result' => 'Invalid Middleware'], 400);
                    die;
                }
            }
            $reflection     = new ReflectionMethod($controller, $action);
            $controllerCls  =  new $controller();
            $response       = $controllerCls->{$action}(...$urlParams);
            echo $response;
            die;
        }catch (\Exception|MainException $er)
        {
            throw new MainException($er->getMessage());
        }

    }

}