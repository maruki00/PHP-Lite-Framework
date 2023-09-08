<?php

global $router;

$router->method('GET')->route('/')->callback(function(){echo 1;})->add();