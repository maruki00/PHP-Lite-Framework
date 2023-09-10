<?php

use App\Controllers\MainController;
use Core\App;

require_once '../vendor/autoload.php';


use Core\Router\Router;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();
$app = new App;
require_once __DIR__.'/../routes/api.php';
//$router = new Router($app);
//require_once "../routes/api.php";
$app->run();

//dd($main);