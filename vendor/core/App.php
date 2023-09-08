<?php

namespace Core;

use Core\Helpers\Json;
use Core\Router\RouteItem;

class App
{
    protected array $routes;
    protected RouteItem $currentRoute;
    protected array $data;
    protected array $params;


    public final function getParams(): array
    {
        return $this->params;
    }
    public final function setParams(array $params): void
    {
        $this->params = $params;
    }
    public final function getRoute(string $key): array
    {
        return $this->routes[$key];
    }
    public final function setRoute(string $key, RouteItem $route): void
    {
        $this->routes[$key] = $route;
    }
    public final function getCurrentRoute(): RouteItem
    {
        return $this->currentRoute;
    }
    public final function setCurrentRoute(RouteItem $currentRoute): void
    {
        $this->currentRoute = $currentRoute;
    }
    public final function getData(): array
    {
        return $this->data;
    }
    public final function setData(array $data): void
    {
        $this->data = $data;
    }

    public function __construct(){}


    private function getUrl():void
    {
        $uri = preg_replace('#(/)+#', '/', $_SERVER['REQUEST_URI']);
    }
    public final function run():void
    {
        dd($this->routes, $this->getCurrentRoute());
        //echo env('LS', '---'). '<br/>';
        $input = file_get_contents('php://input');
        $this->data = Json::decode($input) ?? [];
    }
}