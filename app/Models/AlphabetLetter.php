<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AlphabetLetter extends Model
{
    protected $table = 'alphabet_letters';

    protected $fillable = [
        'sign',
        'letter',
    ];

//    public function userAlphabetLetter(): HasMany
//    {
//        return $this->hasMany(UserAlphabetLetter::class);
//    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_alphabet_letters', 'user_id', 'alphabet_letter_id');
    }
}
