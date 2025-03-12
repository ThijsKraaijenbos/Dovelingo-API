<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSentenceBuilding extends Model
{
    protected $table = 'user_sentence_building';

    protected $fillable = [
        'user_id',
        'sentence_building_id',
        'completed',
    ];

    public function sentenceBuilding(): BelongsTo
    {
        return $this->belongsTo(SentenceBuilding::class);
    }
}
