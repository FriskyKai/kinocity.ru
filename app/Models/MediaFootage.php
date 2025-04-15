<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MediaFootage extends Model
{
    protected $fillable = [
        'media_id',
        'photo',
    ];

    // Связь с медиа
    public function media() {
        return $this->belongsTo(Media::class);
    }
}
