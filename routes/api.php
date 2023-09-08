<?php

global $router;
echo "hello woejkfsdfjn asdb";
$router->method('GET')->route('/')->callback(function(){echo 1;})->add();
echo '<br>sfg';
$router->method('POST')->route('/sdf')->callback(function(){echo 1;})->add();
$router->method('OPTIONS')->route('/asdfasd')->callback(function(){echo 1;})->add();
