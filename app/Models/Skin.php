<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function generateSkinId() {
    $maxIdValue = 999999999;
    $id = rand(0, $maxIdValue);

    while (Skin::where("id", "=", $id)->first() != null) {
        $id = rand(0, $maxIdValue);
    }

    return $id;
}

class Skin extends Model
{
    protected $table = "skin";
    public $timestamps = false;

    public static function create() {
        $s = new Skin;
        $s["id"] = generateSkinId();
        return $s;
    }
}
