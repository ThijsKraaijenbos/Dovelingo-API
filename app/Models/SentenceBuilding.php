<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SentenceBuilding extends Model
{
    protected $table = 'sentence_building';

    protected $fillable = [
        'full_sentence',
        'video_path',
        'lesson_id',
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function userSentenceBuilding(): BelongsToMany
    {
        return $this->belongsToMany(UserSentenceBuilding::class);
    }
}
