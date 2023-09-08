<?php

use App\Controllers\MainController;
use Core\App;

require_once "../vendor/autoload.php";

$main = new MainController;
$app = new App;
$app->run();

//dd($main);