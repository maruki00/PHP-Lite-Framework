<?php

namespace Core\Http\Url;

class UrlParam
{
    private static function getParams(array $params, string $route, string $url):array
    {
        $routeParts = explode('/', trim($route,'/'));
        $val        = explode('/', trim($url,'/'));
        if(!(is_array($route) && is_array($val)))
        {
            return;
        }
        foreach ($routeParts as $key => $value) {
            if(empty($route[$key]) || empty($val[$key])){
                unset($route[$key]);
                unset($val[$key]);
            }else{
                if(preg_match('#^\{(.)+\}$#', $value)){
                    $param = str_replace(['{','}'], '', $value);
                    $params[$param] = $val[$key];
                }
            }
        }
        return $params;
    }
}