<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Skin;
use App\Models\Cart;
use App\Models\CartSkin;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    public function getSkin(Request $request) {
        $userCartId = Cart::select("id")->where("iduser", "=", $request->input("userId"))->first();
        $skinId = CartSkin::select("idskin")->where("idcart", "=", $userCartId["id"])->get();
        $skins = array();

        for($i = 0; $i < sizeof($skinId); $i++){
            $skins[$i]=Skin::where("id", "=", $skinId[$i]["idskin"])->first();
        }

        return[
            "success" => true,
            "skins" => $skins,
            "idcart" => $userCartId["id"],
            "length" => sizeof($skins)
        ];
    }

    public function remove(Request $request) {
        $res = CartSkin::where('idcart', '=', $request->input("cartId"))
            ->where('idskin', '=', $request->input("skinId"))
            ->delete();

        return[
            "success" => $res > 0
        ];
    }
}