<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWord extends Model
{

    protected $table = 'user_words';

    protected $fillable = [
        'user_id',
        'word_id',
        'completed',
    ];

    public function word(): BelongsTo
    {
        return $this->belongsTo(Word::class);
    }
}
