<?php

use Core\Router\Router;
use App\Persistence\Models\Main;
use App\Persistence\Models\TestModel;

Router::get('/', function(){

    new Main;
});