<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Skin;
use App\Models\CartSkin;
use App\Models\Cart;

use Illuminate\Http\Request;


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
        if ($request->has("skinId") && $request->has("userId")) {
            $lastId = CartSkin::select("id")->orderBy('id', 'desc')->first();
            $idcart = Cart::select("id")->where("iduser", "=", $request->input("userId"))->first();
            $id = ($lastId) ? $lastId +1 : 1;
            $cart = new CartSkin;
            $jsonData = $request->json()->all();
            $cart["id"] = $id;
            $cart["idcart"] = $idcart["id"];
            $cart["idskin"] = $jsonData["skinId"];
            $cart->save();
            return [
                "success" => true
            ];
        }
    }   
}