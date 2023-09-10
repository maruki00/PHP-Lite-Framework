<?php

namespace App\Http\Middlewares;

use Core\Middleware\Middleware;
use Core\Requests\Request;

class CoreMiddleware implements Middleware
{
    public function handle()
    {
        return false;
    }
}