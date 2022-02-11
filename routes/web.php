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

$router->get("/skin/{id}", function($id) use ($router) {
    $controller = $router->app->make("App\Http\Controllers\SkinController");
    return $controller->index($id);
});

$router->get("/signup", "SignUpController@index");

$router->get("/login", function() {
    $isAuth = false;

    return view("index", [
        "title" => "Login",
        "subview" => "login",
        "isAuthenticated" => $isAuth,
    ]);
});

class Skin
{
    public $name;
    public $link;
}

$router->get("/skins", "SkinsController@index");

$router->get("/checkout?", "CheckoutController@index");

$router->get("/account", "UserController@account");

$router->get("/cart", function() {
    $isAuth = true;

    return view("index", [
        "title" => "Carrello",
        "subview" => "cart",
        "isAuthenticated" => $isAuth,
    ]);
});

$router->get("/contact", function() {
    $isAuth = true;

    return view("index", [
        "title" => "Contatti",
        "subview" => "contact",
        "isAuthenticated" => $isAuth,
    ]);
});

$router->group(["prefix" => "api"], function () use ($router) {
    $router->post("/testAuth", "UserController@test");
    $router->post("/login", "UserController@login");
    $router->post("/signup", "UserController@signup");
    $router->post("/skin", "SkinController@addCart");
    $router->post("/cart", "CartController@getSkin");
    $router->post("/cart/remove", "CartController@remove");
    $router->post("/cart/checkout", "CartController@checkout");
    $router->post("/transaction/{userId}", "TransactionController@index");
    $router->post("/card/{userId}", "TransactionController@index");
});