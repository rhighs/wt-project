<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use App\Models\Skin;

class TestController extends BaseController
{
    //

    public function index() {
        return Skin::all();
    }
}