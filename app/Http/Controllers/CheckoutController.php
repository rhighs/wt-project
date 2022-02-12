<?php

namespace App\Http\Controllers;

use App\Models\CardUser;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

use App\Models\Skin;
use App\Models\Cart;
use App\Models\Users;
use App\Models\CartSkin;
use App\Models\Transaction;
use App\Models\SkinTransaction;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends BaseController
{
    public function index(Request $request) {
        $cartId = $request->get("cartId");
        $containsSkins = sizeof(collect(CartSkin::where("idcart", "=", $cartId)->get())->toArray()) > 0;

        if (Cart::where("id", "=", $cartId)->first() == null || $containsSkins === false) {
            $data = [
                "subview" => "error",
                "errorTitle" => "ERROR 404: NOT FOUND",
                "errorMessage" => "Non siamo riusciti a trovare il contenuto :("
            ];

            return response(view("error", $data), 404);
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
            return Skin::where("id", "=", $skinInCart["idskin"])->first()["price"];
        }, $skinsInCart), function ($carry, $item) {
            $carry += $item;
            return $carry;
        });

        $card = CardUser::where("cardnumber", "=", $jsonData["cardNumber"])->first();
        if (!$card) {
            $card = CardUser::create();
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
        $transaction["price"] = $totalPrice * -1;
        $transaction->save();

        foreach ($skinsInCart as $skinInCart) {
            $skinTransaction = SkinTransaction::create();
            $skinTransaction["idtransaction"] = $transaction["id"];
            $skinTransaction["idskin"] = $skinInCart["idskin"];
            $skinTransaction->save();
        }

        $user = Users::where("id", "=", $userId)->first();

        $data = array('name'=> "SKUSKINS srl.");
   
        Mail::send([], $data, function($message) use ($user, $transaction) {
           $message->to($user["email"], "SkuSkins")->subject("Resoconto dell'ultimo acquisto");
           $randomString = "Grazie per aver comprato da SKUSKINS, aspettiamo il tuo ritorno!!\n";
           $message->setBody("Odine n. " . $transaction["id"] . "\n" . "Totale: € " . $transaction["price"] . "\n\n\n" . $randomString);
           $message->from('skuskins@gmail.com', 'SKUSKINS srl.');
        });

        return [
            "success" => true
        ];
    }
}
