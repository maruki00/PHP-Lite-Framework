<?php

namespace Core\Response;

use Core\Helpers\Json;
use Core\Http\Server;
use JetBrains\PhpStorm\NoReturn;

class Response
{
    private array $headers = [];
    public final function headers(array $headers):mixed
    {
        $this->headers = [...$this->headers, ...$headers];
        return $this;
    }

    public final function redirect(string $url):void
    {
        if(!headers_sent())
        {
            header('Location: '.$url);
            exit;
        }
    }

    public final function json(array|object $data, int $code , array $headers = []):bool|string
    {
        $httpVersion = Server::get('SERVER_PROTOCOL') ?? 'HTTP/1.1';
        $this->data = $data;
        $this->statusCode = $code;
       // $this->headers[]  = $headers;

        foreach ($this->headers as $header)
        {
            header($header);
        }
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($code);
//        header("{$httpVersion} {$code}");
        return Json::encode($data);
    }

    public final function html(string $data, int $code, array $headers=[]):string
    {
        $httpVersion = Server::get('SERVER_PROTOCOL') ?? 'HTTP/1.1';
        $this->data = $data;
        $this->statusCode = $code;
        $this->headers[]  = $headers;
        foreach ($this->headers as $header)
        {
            header($header);
        }
        header('Content-Type: text/html; charset=UTF-8');
        header("{$httpVersion} {$code}");
        return $data;
    }
}