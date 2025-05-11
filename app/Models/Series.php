<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
        'media_id',
        'series_number',
        'url'
    ];

    // Связь с медиа
    public function media() {
        return $this->belongsTo(Media::class);
    }
}
