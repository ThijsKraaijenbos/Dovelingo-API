<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFillInTheBlanks extends Model
{
    protected $table = 'user_fill_in_the_blanks';

    protected $fillable = [
        'user_id',
        'fill_in_the_blanks_id',
        'completed',
    ];

    public function fillInTheBlanks(): BelongsTo
    {
        return $this->belongsTo(FillInTheBlanks::class);
    }
}
