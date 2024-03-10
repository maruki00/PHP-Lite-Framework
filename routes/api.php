<?php

use Core\Router\Router;

use App\Persistence\Models\TestModel;
use Core\DB\Model;

Router::get('/', function(){

    class Main extends Model{

    }

    new Main();
});