<?php

use Core\Router\Router;
use App\Controllers\MainController;
Router::group(['prefix' => '/api', 'middlewares' => ['cors1']], function() {
    Router::group(['prefix' => '/users', 'middlewares' => ['cors']], function () {
        Router::get('/main/{name}/{id}', [MainController::class, 'index']);
        Router::post('/home', ['users', 'store']);
        Router::put('/items', 'task@index', ['cors', 'auth'], ['auth']);
        Router::put('/items', 'task-index', ['cors', 'auth']);
        Router::put('/item/{id}/{name}', 'task-index', ['cors', 'auth']);
    });
});
