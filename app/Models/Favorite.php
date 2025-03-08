<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'media_id',
        'date',
    ];

    // Связь с медиа
    public function media() {
        return $this->belongsTo(Media::class);
    }

    // Связь с пользователем
    public function user() {
        return $this->belongsTo(User::class);
    }
}
