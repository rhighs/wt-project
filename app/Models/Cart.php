<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = "id";
    protected $table = "cart";
    public $incrementing = true;
    public $timestamps = false;

}