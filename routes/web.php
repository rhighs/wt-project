<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/home', function() {
    return view("index", []);
});

$router->get('products', function() {
    return view('products');
});

$router->get('about', function() {
    return view('about');
});

$router->get('contact', function() {
    return view('contact');
});

$router->get('products/{pId}', function($pId) {
    $item = $pId;
    return view('single-product', [$item]);
});