<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\CartSkin;
use App\Models\Cart;
use App\Models\Skin;

class SkinController extends BaseController
{
    public function generateId() {
        $maxIdValue = 9999999999999999;
        $id = rand(0, $maxIdValue);

        while (CartSkin::where("id", "=", $id)->first() != null) {
            $id = rand(0, $maxIdValue);
        }

        return $id;
    }

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