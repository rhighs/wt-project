<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = "id";
    protected $table = "users";
    public $incrementing = false;
    public $timestamps = false;
}
