<?php


namespace App\Controllers;


use Core\Requests\Request;

class MainController
{
    public function __construct()
    {
        print("hello world");
    }

    public final function index(Request $request, string $name, int $id):string
    {
        return "124";
    }
}