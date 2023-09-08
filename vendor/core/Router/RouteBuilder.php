<?php

namespace Core\Router;

interface RouteBuilder
{
    public function prefix(string $prefix):RouteBuilder;
    public function route(string $route):RouteBuilder;
    public function action(string $action):RouteBuilder;
    public function middlware(array $middlewares):RouteBuilder;
    public function httpMethod(string $method):RouteBuilder;
    public function group(callable $calback):RouteBuilder;
    public function callback(callable $callback):RouteBuilder;
    public function add();
}