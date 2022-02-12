<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Transaction;
use App\Models\CardUser;

class TransactionController extends BaseController
{
    public function index($userId) {
        $cardsUser = collect(CardUser::where("iduser", "=", $userId)->get())->toArray();

        if (sizeof($cardsUser) == 0 && false) {
            return [
                "success" => false
            ];
        }

        $transactions = [];
        foreach ($cardsUser as $card) {
            $newTransactions = collect(Transaction::join("carduser", "idcard", "=", "carduser.id")
                ->where("idcard", "=", $card["id"])
                ->get())->toArray();
            $transactions = array_merge($transactions, $newTransactions);
        }

        return [
            "success" => true,
            "data" => $transactions
        ];
    }


}
