<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\CardUser;

class CardUserController extends BaseController
{
    public function index($userId) {
        $cards = collect(CardUser::where("iduser", "=", $userId)->get())->toArray();

        if (sizeof($cards) == 0) {
            return [
                "success" => false
            ];
        }

        return [
            "success" => true,
            "data" => $cards
        ];
    }
}
