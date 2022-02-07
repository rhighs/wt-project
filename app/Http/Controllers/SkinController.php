<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Skin;
use App\Models\Cart;

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

    public function addCart(Request $request){
        /*if ($request->has("skinId") && $request->has("userId")) {
            $cart = Cart::where("iduser", "=", $request->input("userId"))
                ->first();

            if ($cart) {
                return [
                    "success" => true
                ];
            }
        }*/
        $cart = new Cart;
        $cart["id"] = 1;
        $cart["iduser"] = 1;
        $cart->save();
        return [
            "success" => true
        ];
    }
}