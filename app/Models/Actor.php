<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'surname',
        'name',
        'birthday',
        'bio',
        'photo',
    ];

    // Связь с медиа_актёрами
    public function mediaActors() {
        return $this->hasMany(MediaActor::class);
    }
}
