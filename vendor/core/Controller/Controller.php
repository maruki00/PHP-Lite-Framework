<?php

namespace Core\Controller;

use Core\Response\Response;

class Controller
{
    public function notfound()
    {
        return (new Response())->json(['message' => 'Page Not Found'], 404);
    }
}