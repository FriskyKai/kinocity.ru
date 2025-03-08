<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
    ];

    // Связь с медиа_жанрами
    public function mediaGenres() {
        return $this->hasMany(MediaGenre::class);
    }
}
