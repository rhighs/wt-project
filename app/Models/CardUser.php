<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function generateCardUserId()
{
    $maxIdValue = 999999999;
    $id = rand(0, $maxIdValue);

    while (CardUser::where("id", "=", $id)->first() != null) {
        $id = rand(0, $maxIdValue);
    }

    return $id;
}

class CardUser extends Model
{
    protected $table = "carduser";
    public $timestamps = false;

    public static function create() {
        $cu = new CardUser;
        $cu["id"] = generateCardUserId();
        return $cu;
    }
}