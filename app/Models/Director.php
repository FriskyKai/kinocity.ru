<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable = [
        'surname',
        'name',
        'birthday',
        'bio',
        'photo',
    ];

    // Связь с медиа_режиссёрами
    public function mediaDirectors() {
        return $this->hasMany(MediaDirector::class);
    }
}
