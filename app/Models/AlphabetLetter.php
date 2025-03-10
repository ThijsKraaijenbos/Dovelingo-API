<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlphabetLetter extends Model
{
    protected $fillable = [
        'sign',
        'letter',
    ];
}
