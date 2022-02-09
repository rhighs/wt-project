<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class CheckoutController extends BaseController
{
    public function index() {
        return view("index", [
            "title" => "Checkout",
            "subview" => "checkout"
        ]);
    }
}
