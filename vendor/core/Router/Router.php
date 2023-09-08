<?php
namespace Core\Router;

use Core\App;
use Illuminate\Support\Facades\Route;

class Router extends App implements RouteBuilder
{

    private  RouteItem $item;

    public function __invoke()
    {
        $this->item = new RouteItem();
    }

    public function prefix(string $prefix){
        $this->item->setPrefix($prefix);
    }

    public function route(string $route)
    {
        $tmpRoute = "{$this->item->getPrefix()}/$route";
        $tmpRoute = preg_replace('/(\/+)/', '/', $tmpRoute);
        $route    = trim('/',$tmpRoute);
        $this->item->setRoute('/'.$route);
    }

    public function action(string $action)
    {
        $this->item->setAction($action);
    }

    public function middlware(array $middlewares)
    {
        $this->item->setMiddlware($middlewares);
    }

    public function httpMethod(string $method)
    {
        $this->item->setHttpMethod($method);
    }

    public function group(callable $calback)
    {
        $calback();
    }

    public function done()
    {
        $this->routes[$this->item->getRoute()] = $this->item;
    }

}