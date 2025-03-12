<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAlphabetLetter extends Model
{
//    protected $table = 'user_alphabet_letters';

    protected $fillable = [
        'user_id',
        'alphabet_letter_id',
        'completed',
    ];

    public function alphabetLetter(): BelongsTo
    {
        return $this->belongsTo(AlphabetLetter::class, 'alphabet_letter_id');
    }

//    public function user(): BelongsTo
//    {
//        return $this->belongsTo(User::class);
//    }
}
