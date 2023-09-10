<?php

namespace Core\Router;

use Core\Controller\ErrorController;

class ControllerParse
{
    public final static function parse(callable|string|array $controller):array
    {
        if(is_string($controller)){
            [$controller, $action] = explode('@', $controller);
            if(!(isset($controller) && isset($action)))
            {
                return [ErrorController::class, 'notfound'];
//                @trigger_error("Invalid Controller or Action ");
//                die;
            }
            return [$controller, $action];
        }else if(is_array($controller)){
            if(count($controller)!== 2)
            {
                return [ErrorController::class, 'notfound'];
//                @trigger_error("Invalid Controller or Action ");
//                die;
            }
            return $controller;
        }else if (is_callable($controller))
        {
            return [$controller, null];
        }else{
            @trigger_error("Invalid Controller or Action ");
            die;
        }
        return [ErrorController::class, 'notfound'];
    }
}