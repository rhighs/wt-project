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

$router->get("/", "HomeController@index");

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

<<<<<<< HEAD
class Skin
{
    public $name;
    public $link;
}
=======
$router->get('/signup', function() {
    $isAuth = false;

    return view("index", [
        "title" => "Sign Up",
        "subview" => "signup",
        "isAuthenticated" => $isAuth,
    ]);
});
>>>>>>> d799a4a (Added more db stuff...)

$router->get('/skins', function() {
    $isAuth = false;

    $skin1 = new Skin();
    $skin2 = new Skin();
    $skin3 = new Skin();

    $skin1->name = "eksere";
    $skin2->name = "ruspa";
    $skin3->name = "dioh";
    $skin1->link = "yoooh";
    $skin2->link = "sheeesh";
    $skin3->link = "gesuh";

    $skins = array($skin1, $skin2, $skin3);

    return view("index", [
        "title" => "Skins",
        "subview" => "skins",
        "isAuthenticated" => $isAuth,
        "skins" => $skins
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