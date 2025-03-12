<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'display_name',
        'full_name',
        'email',
        'sso_token',
        'batch_id',
        'role',
        'score',
        'streak',
        'last_login'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges', 'user_id', 'badge_id');
    }

    public function userWord(): BelongsToMany
    {
        return $this->belongsToMany(UserWord::class);
    }

    public function userFillInTheBlanks(): BelongsToMany
    {
        return $this->belongsToMany(UserFillInTheBlanks::class);
    }

    public function userSentenceBuilding(): BelongsToMany
    {
        return $this->belongsToMany(UserSentenceBuilding::class);
    }

    public function alphabetLetter(): BelongsToMany
    {
        return $this->belongsToMany(AlphabetLetter::class, 'user_alphabet_letters', 'user_id', 'alphabet_letter_id');
    }

    public function word(): BelongsToMany
    {
        return $this->belongsToMany(Word::class, 'user_words', 'user_id', 'word_id');
    }
}
