<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllowedUser extends Model
{
    protected $fillable = ['email','delete_at'];
}

