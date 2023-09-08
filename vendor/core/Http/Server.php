<?php

namespace Core\Http;

class Server
{
    public static function get(): array
    {
        return $_SERVER;
    }
}