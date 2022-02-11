<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function generateCartSkinId() {
    $maxIdValue = 9999999999999999;
    $id = rand(0, $maxIdValue);

    while (CartSkin::where("id", "=", $id)->first() != null) {
        $id = rand(0, $maxIdValue);
    }

    return $id;
}

class CartSkin extends Model
{
    protected $primaryKey = "id";
    protected $table = "cartskin";
    public $incrementing = true;
    public $timestamps = false;

    public static function create() {
        $cs = new CartSkin;
        $cs["id"] = generateCartSkinId();
        return $cs;
    }
}