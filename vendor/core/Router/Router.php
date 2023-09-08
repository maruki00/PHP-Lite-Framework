<?php
namespace Core\Router;

use Core\App;
use Core\Exceptions\MainException;
use Core\Http\Server;
use Illuminate\Support\Facades\Route;

class Router implements RouteBuilder
{
    private static array $allowedMethod ;
    private  RouteItem $item;

    public function __construct(
        protected App $app
    ){
        $this->item = new RouteItem();
    }

    public function __invoke()
    {}

    public function prefix(string $prefix):RouteBuilder
    {
        $this->item->setPrefix($prefix);
        return $this;
    }

    public function route(string $route):RouteBuilder
    {

        $tmpRoute = "{$this->item->getPrefix()}/$route";
        $tmpRoute = preg_replace('/(\/+)/', '/', $tmpRoute);
        $route    = trim('/',$tmpRoute);
        $this->item->setRoute('/'.$route);
        return $this;
    }

    public function action(string $action):RouteBuilder
    {
        $this->item->setAction($action);
        return $this;
    }

    public function middlware(array $middlewares):RouteBuilder
    {
        $this->item->setMiddlware($middlewares);
        return $this;
    }

//    public function httpMethod(string $method):RouteBuilder
//    {
//        echo "$method<br/>";
//        $this->item->setHttpMethod($method);
//        return $this;
//    }

    public function group(callable $calback):RouteBuilder
    {
        $calback();
        return $this;
    }

    public final function callback(callable $callback):RouteBuilder
    {
        $this->item->setCallback($callback);
        return $this;
    }

    public final function method(string $method):RouteBuilder
    {
        echo "Method <br>";
        $allowedMethod = ['POST', 'GET', 'OPTIONS', 'PATCH', 'DELETE', 'PUT'];
        $method = mb_strtoupper($method);
        if(!in_array($method, $allowedMethod)) {
            echo json_decode(["Invalid Method or Not Allowed"]);
            die(500);
        }
        $this->item->setHttpMethod($method);
        return $this;
    }

    public function add():void
    {
        $this->app->addRoute($this->item);
    }

}