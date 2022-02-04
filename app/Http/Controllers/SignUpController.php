<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class SignUpController extends BaseController
{
    public function index(Request $request) {
        return view("index", [
            "title" => "Sign Up",
            "subview" => "signup"
        ]);
    }
}