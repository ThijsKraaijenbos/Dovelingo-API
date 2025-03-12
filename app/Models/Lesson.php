<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    protected $fillable = [
        'lesson_name',
    ];

    public function word(): HasMany
    {
        return $this->hasMany(Word::class);
    }

    public function sentenceBuilding(): HasMany
    {
        return $this->hasMany(SentenceBuilding::class);
    }

    public function fillInTheBlanks(): HasMany
    {
        return $this->hasMany(FillInTheBlanks::class);
    }
}
