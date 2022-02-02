<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Skin;

class SkinController extends BaseController
{
    public function index($id) {
        $isAuth = true;

        $skin = Skin::find($id);

        return view("index", [
            "title" => $skin["name"],
            "subview" => "skin",
            "isAuthenticated" => $isAuth,
            "item" => $skin
        ]);
    }
}