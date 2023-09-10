<?php

use Core\Router\Router;
Router::get('/', ['users', 'index']);
Router::post('/home', ['users', 'store']);
Router::put('/items', 'task@index', ['cors', 'auth']);
Router::put('/items', 'task-index', ['cors', 'auth'])->group();