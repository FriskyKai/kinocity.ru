<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaActor extends Model
{
    protected $fillable = [
        'actor_id',
        'media_id',
    ];

    // Связь с медиа
    public function media() {
        return $this->belongsTo(Media::class);
    }

    // Связь с актёром
    public function actor() {
        return $this->belongsTo(Actor::class);
    }
}
