<?php


namespace App\Controllers;


use Core\Controller\Controller;
use Core\Requests\Request;

class MainController extends Controller
{

    public final function index(string $name, int $id)
    {
        echo "$name --- $id";
        return "skdjfhg";
    }
}