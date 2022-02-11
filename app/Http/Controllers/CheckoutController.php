<?php

namespace App\Http\Controllers;

use App\Models\CardUser;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

use App\Models\SkinTransaction;
use App\Models\CartSkin;
use App\Models\Skin;
use App\Models\Cart;
use App\Models\Transaction;

class CheckoutController extends BaseController
{
    public function index(Request $request) {
        $cartId = $request->get("cardId");

        if (Cart::where("id", "=", $cartId)->first() == null) {
            $data = [
                "subview" => "error",
                "errorTitle" => "ERROR 404: NOT FOUND",
                "errorMessage" => "Non siamo riusciti a trovare il contenuto :("
            ];

            return view(view("error", $data), 404);
        }

        return view("index", [
            "title" => "Checkout",
            "subview" => "checkout",
            "cartId" => $cartId
        ]);
    }

    public function acceptPayment(Request $request) {
        $jsonData = $request->json()->all();
        $isValidRequest = $this->validate($request, [
            "cartId" => "required",
            "cardNumber" => "required",
            "cardExpiry" => "required",
            "cardCVC" => "required"
        ]);

        if ($isValidRequest === false) {
            return [
                "success" => false,
                "error" => "Richiesta non valida"
            ];
        }

        $userId = Cart::where("id", "=", $jsonData["cartId"])->first()["iduser"];
        $skinsInCart = collect(CartSkin::where("idcart", "=", $jsonData["cartId"])->get())->toArray();
        $totalPrice = array_reduce(array_map(function ($skinInCart) {
            return Skin::where("id", "=", $skinInCart["id"])->first()["price"];
        }, $skinsInCart), function ($carry, $item) {
            $carry += $item;
            return $carry;
        });

        $card = CardUser::where("cardnumber", "=", $jsonData["cardNumber"])->first();
        if (!$card) {
            $card = CardUser::crate();
            $card["iduser"] = $userId;
            $card["cardnumber"] = $jsonData["cardNumber"];
            $card["expiry"] = $jsonData["cardExpiry"];
            $card["cvc"] = $jsonData["cardCVC"];
            $card->save();
        }

        CartSkin::where("idcart", "=", $jsonData["cartId"])->delete();
        $transaction = Transaction::create();
        $transaction["idcard"] = $card["id"];
        $transaction["timestamp"] = date("Y-m-d H:i:s");
        $transaction["price"] = $totalPrice;
        $transaction->save();

        foreach ($skinsInCart as $skin) {
            $skinTransaction = SkinTransaction::create();
            $skinTransaction["idtransaction"] = $transaction["id"];
            $skinTransaction["idskin"] = $skin["id"];
            $skinTransaction->save();
        }

        return [
            "success" => true
        ];
    }
}
