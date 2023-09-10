<?php

namespace Core\Router;

use Core\Controller\ErrorController;

class ControllerParse
{
    public final static function parse(callable|string|array $controller):array
    {
        if(is_string($controller)){
            @[$controller, $action] = explode('@', $controller);
            if(!(isset($controller) && isset($action)))
            {
                return [ErrorController::class, 'notfound'];
            }
            return [$controller, $action];
        }else if(is_array($controller)){
            if(count($controller) !== 2)
            {
                return [ErrorController::class, 'notfound'];
            }
            return $controller;
        }else if (is_callable($controller))
        {
            return [$controller, $controller        ];
        }
        return [ErrorController::class, 'notfound'];
    }
}