<?php

use App\Controllers\MainController;
use Core\App;

require_once "../vendor/autoload.php";

$main = new MainController;
$app = new App;


dd($main);