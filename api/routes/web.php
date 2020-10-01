<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', \App\Http\Controllers\Auth\LoginController::class);

$router->group(['middleware' => 'auth'], function ($router) {
    $router->post('logout', \App\Http\Controllers\Auth\LogoutController::class);
    $router->get('me', \App\Http\Controllers\Auth\MeController::class);
});
