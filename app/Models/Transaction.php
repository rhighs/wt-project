<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function generateTransactionId() {
    $maxIdValue = 999999999;
    $id = rand(0, $maxIdValue);

    while (Transaction::where("id", "=", $id)->first() != null) {
        $id = rand(0, $maxIdValue);
    }

    return $id;
}

class Transaction extends Model {
    protected $table = "transaction";
    public $timestamps = false;

    public static function create() {
        $t = new Transaction;
        $t["id"] = generateTransactionId();
        return $t;
    }
}