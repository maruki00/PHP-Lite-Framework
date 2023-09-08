<?php

namespace Core\Http;

class UrlParser
{
    private function generatePattern(string $route, string $url){
        $url = explode('/', trim($url,'/'));
        foreach ($url ?? [] as $key => $value) {
            if(empty($url[$key])){
                unset($url[$key]);
            }else{
                $url[$key] = preg_replace('#^\{(.)+\}$#', '(.)+', $value);
            }
        }
        return implode('/', $url);
    }

    private function getParams($route,$url){
        $route = explode('/', trim($route,'/'));
        $val = explode('/', trim($url,'/'));
        if(is_array($route) and is_array($val)){
            foreach ($route as $key => $value) {
                if(empty($route[$key]) || empty($val[$key])){
                    unset($route[$key]);
                    unset($val[$key]);
                }else{
                    if(preg_match('#^\{(.)+\}$#', $value)){
                        $param = str_replace(['{','}'], '', $value);
                        $this->params[$param] = $val[$key];
                    }
                }
            }
        }
    }
    public static function parse(string $uri):array
    {

    }
}