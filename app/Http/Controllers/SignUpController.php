<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class SignUpController extends BaseController
{
    public function index() {
        $isAuth = false;
        return view("index", [
            "title" => "Sign Up",
            "subview" => "signup",
            "isAuthenticated" => $isAuth
        ]);
    }
}
