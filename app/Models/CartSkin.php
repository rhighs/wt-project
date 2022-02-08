<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartSkin extends Model
{
    protected $primaryKey = "id";
    protected $table = "cartskin";
    public $incrementing = true;
    public $timestamps = false;
}