<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaGenre extends Model
{
    protected $fillable = [
        'media_id',
        'genre_id',
    ];

    // Связь с медиа
    public function media() {
        return $this->belongsTo(Media::class);
    }

    // Связь с жанром
    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
