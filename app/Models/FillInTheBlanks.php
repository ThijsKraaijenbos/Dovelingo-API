<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FillInTheBlanks extends Model
{
    protected $table = 'fill_in_the_blanks';
    protected $fillable = [
        'full_sentence',
        'video_path',
        'missing_words',
        'lesson_id',
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
