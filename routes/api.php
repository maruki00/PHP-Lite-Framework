<?php

use Core\Router\Router;
use App\Persistence\Models\Main;

Router::get('/', function(){

    dd(Main::query());
});