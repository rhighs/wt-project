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
    $isAuth = true;

    return view("index", [
        "title" => "index",
        "subview" => "home",
        "isAuthenticated" => $isAuth
    ]);
});

$router->get('/product/{pId}', function() {
    $isAuth = true;
    $item = [
        "name" => "sdjfniosdf",
        "price" => "345"
    ];

    return view("index", [
        "title" => "product",
        "subview" => "product",
        "isAuthenticated" => $isAuth,
        "item" => $item
    ]);
});

$router->get('/login', function() {
    $isAuth = false;

    return view("index", [
        "title" => "Login",
        "subview" => "login",
        "isAuthenticated" => $isAuth,
    ]);
});

$router->get('/skins', function() {
    $isAuth = false;

    return view("index", [
        "title" => "Skins",
        "subview" => "skins",
        "isAuthenticated" => $isAuth,
    ]);
});

$router->get('/account', function() {
    $isAuth = true;
    $item = [
        "name" => "SkuGas",
        "surname" => "Ricci",
        "email" => "skugod@gskianto.com"
    ];

    return view("index", [
        "title" => "account",
        "subview" => "account",
        "isAuthenticated" => $isAuth,
        "item" => $item
    ]);
});

$router->get('/contact', function() {
    $isAuth = true;

    return view("index", [
        "title" => "contact",
        "subview" => "contact",
        "isAuthenticated" => $isAuth,
    ]);
});