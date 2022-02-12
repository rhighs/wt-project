<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function generateUserId()
{
    $maxIdValue = 999999999;
    $id = rand(0, $maxIdValue);

    while (Users::where("id", "=", $id)->first() != null) {
        $id = rand(0, $maxIdValue);
    }

    return $id;
}

class Users extends Model
{
    protected $primaryKey = "id";
    protected $table = "users";
    public $incrementing = false;
    public $timestamps = false;

    public static function create() {
        $user = new Users;
        $user["id"] = generateUserId();
        return $user;
    }
}
