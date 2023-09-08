<?php

namespace App\Middlewares;

use Core\Requests\Request;

class CoreMiddleware implements Middleware
{
    public function handle(Request $request, \Closure $next)
    {
        return $next($request);
    }
}