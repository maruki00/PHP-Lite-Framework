<?php

namespace Core\Middleware;

use Core\Requests\Request;

interface Middleware
{
    public function handle();
}