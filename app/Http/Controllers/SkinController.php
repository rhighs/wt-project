<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\CartSkin;
use App\Models\Cart;
use App\Models\Skin;
use App\Models\Users;
use App\Models\SkinTransaction;
use App\Models\Transaction;

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
            $idcart = Cart::select("id")->where("iduser", "=", $request->input("userId"))->first();
            $cart = CartSkin::create();
            $jsonData = $request->json()->all();
            $cart["idcart"] = $idcart["id"];
            $cart["idskin"] = $jsonData["skinId"];
            $cart->save();

            return [
                "success" => true
            ];
        }
    }   

    public function ownedBy($userId) {
        if (Users::where("id", "=", $userId)->first() == null) {
            return [
                "success" => false
            ];
        }

        $skins = collect(SkinTransaction::join("skin", "skin.id", "=", "skintransaction.idskin")
            ->join("transaction", "transaction.id", "=", "skintransaction.idtransaction")
            ->join("carduser", "carduser.id", "=", "transaction.idcard")
            ->where("carduser.iduser", "=", $userId)->get())->toArray();

        return [
            "success" => true,
            "skins" => $skins
        ];
    }

    public function soldBy($userId) {
        $userExists = Users::where("id", "=", $userId)->first();

        if ($userExists == null) {
            return [
                "success" => false,
                "error" => "L'utente specificato non esiste"
            ];
        }

        $skins = collect(Skin::where("sellerid", "=", $userId)->get())->toArray();

        return [
            "success" => true,
            "skins" => $skins
        ];
    }

    public function insert(Request $request) {
        $jsonData = $request->json()->all();
        $isValidRequest = $this->validate($request, [
            "name" => "required",
            "price" => "required",
            "image" => "required",
            "userId" => "required"
        ]);

        if ($isValidRequest === false) {
            return [
                "success" => false
            ];
        }

        $skin = Skin::create();

        $skin["name"] = $jsonData["name"];
        $skin["price"] = $jsonData["price"];
        $skin["imagelink"] = $jsonData["image"];
        $skin["sellerid"] = $jsonData["userId"];
        $skin->save();

        $transaction = Transaction::create();
        $transaction["timestamp"] = date("Y-m-d H:i:s");
        $transaction["price"] = $jsonData["price"];
        $transaction->save();

        $skinTransaction = SkinTransaction::create();
        $skinTransaction["idskin"] = $skin["id"];
        $skinTransaction["idtransaction"] = $transaction["id"];
        $skinTransaction->save();

        return [
            "success" => true
        ];
    }
}