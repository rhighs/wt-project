<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function generateSkinTransactionId() {
    $maxIdValue = 999999999;
    $id = rand(0, $maxIdValue);

    while (SkinTransaction::where("id", "=", $id)->first() != null) {
        $id = rand(0, $maxIdValue);
    }

    return $id;
}

class SkinTransaction extends Model
{
    protected $table = "skintransaction";
    public $timestamps = false;

    public static function create() {
        $st = new SkinTransaction;
        $st["id"] = generateSkinTransactionId();
        return $st;
    }
}