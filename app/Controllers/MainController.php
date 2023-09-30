<?php


namespace App\Controllers;


use App\Http\Requests\MainRequest;
use Core\Controller\Controller;
use Core\Response\Response;


class MainController extends Controller
{

    public final function index(MainRequest $request, string $name, int $id)
    {
        return Response::json(['result'=> 'blah blah not found'], 404);
    }
}