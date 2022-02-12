<?php

$router->get("/", "HomeController@index");

$router->get("/skin/{id}", function($id) use ($router) {
    $controller = $router->app->make("App\Http\Controllers\SkinController");
    return $controller->index($id);
});

$router->get("/signup", "SignUpController@index");

$router->get("/login", function() {
    return view("index", [
        "title" => "Login",
        "subview" => "login"
    ]);
});

$router->get("/skins", "SkinsController@index");

$router->get("/checkout", "CheckoutController@index");

$router->get("/account", "UserController@account");

$router->get("/cart", function() {
    return view("index", [
        "title" => "Carrello",
        "subview" => "cart"
    ]);
});

$router->get("/contact", function() {
    return view("index", [
        "title" => "Contatti",
        "subview" => "contact"
    ]);
});

$router->group(["prefix" => "api"], function () use ($router) {
    $router->post("/login", "UserController@login");
    $router->post("/skin", "SkinController@addCart");
    $router->post("/cart", "CartController@getSkin");
    $router->post("/signup", "UserController@signup");
    $router->post("/testAuth", "UserController@test");
    $router->post("/cart/remove", "CartController@remove");
    $router->post("/cart/checkout", "CartController@checkout");
    $router->post("/card/{userId}", "CardUserController@index");
    $router->post("/cart/info/{cartId}", "CartController@cartInfo");
    $router->post("/acceptPayment", "CheckoutController@acceptPayment");
    $router->post("/transaction/{userId}", "TransactionController@index");
    $router->post("/skin/ownedBy/{userId}", "SkinController@ownedBy");
});
