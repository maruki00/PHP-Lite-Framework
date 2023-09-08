<?php

namespace Core\Http;

use Core\App;
use Core\Exceptions\MainException;

class Url extends App
{
    public static function parse():array
    {
        $data = Server::get();
        if(empty($data))
        {
            throw new MainException('Invalid Request');
        }
        $uri = preg_replace('#(/)+#', '/', $data);
        $requestUri = !in_array($uri, ['/','']) ? trim($uri,'/') : '/';

    }
}