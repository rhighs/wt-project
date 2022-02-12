<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function generateCartId()
{
    $maxIdValue = 999999999;
    $id = rand(0, $maxIdValue);

    while (Cart::where("id", "=", $id)->first() != null) {
        $id = rand(0, $maxIdValue);
    }

    return $id;
}

class Cart extends Model
{
    protected $primaryKey = "id";
    protected $table = "cart";
    public $incrementing = true;
    public $timestamps = false;

    public static function create() {
        $c = new Cart;
        $c["id"] = generateCartId();
        return $c;
    }
}