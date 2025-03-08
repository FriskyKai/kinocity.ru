<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaDirector extends Model
{
    protected $fillable = [
        'director_id',
        'media_id',
    ];

    // Связь с медиа
    public function media() {
        return $this->belongsTo(Media::class);
    }

    // Связь с режиссёром
    public function director() {
        return $this->belongsTo(Director::class);
    }
}
