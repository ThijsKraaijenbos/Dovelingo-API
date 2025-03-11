<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Word extends Model
{
    protected $fillable = [
        'title',
        'video_path',
        'lesson_id',
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function userWord(): BelongsToMany
    {
        return $this->belongsToMany(UserWord::class);
    }
}
