<?php

namespace Core\Router;

class RouteItem implements RouteBuilder
{

    private string $prefix      = '';
    private string $route       = '';
    private string $action      = '';
    private string $controller  = '';
    private array  $middlwares  = [];
    private string $httpMethod  = '';
    private        $callback    = null;

    public function prefix(string $prefix):RouteBuilder{
        $this->prefix = $prefix;
        return $this;
    }
    public function route(string $route):RouteBuilder{
        $this->route = $route;
        return $this;
    }
    public function action(string $action):RouteBuilder{
        $this->action = $action;
        return $this;
    }
    public function controller(string $controller):RouteBuilder
    {
        $this->controller = $controller;
        return $this;
    }
    public function middlwares(array $middlewares):RouteBuilder{
        $this->middlwares = $middlewares;
        return $this;
    }
    public function method(string $method):RouteBuilder{

        $this->method = $method;
        return $this;
    }
    public function group(callable $calback):RouteBuilder{
        $calback();
        return $this;
    }
    public function callback(callable $callback):RouteBuilder{
        $this->callback = $callback;
        return $this;
    }
}