<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{

    protected $table = 'gifs';
    protected $fillable = [
        'name',
        'gif_path',
    ];
}
