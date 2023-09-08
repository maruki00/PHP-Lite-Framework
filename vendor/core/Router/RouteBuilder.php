<?php

namespace Core\Router;

interface RouteBuilder
{
    public function prefix(string $prefix);
    public function route(string $route);
    public function action(string $action);
    public function middlware(array $middlewares);
    public function httpMethod(string $method);
    public function group(callable $calback);
    public function done();
}