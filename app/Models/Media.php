<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'duration',
        'release',
        'rating',
        'episodes',
        'preview',
        'contentURL',
        'studio_id',
        'ageRating_id',
    ];

    // Связь с студией
    public function studio() {
        return $this->belongsTo(Studio::class);
    }

    // Связь с возрастным рейтингом
    public function ageRating() {
        return $this->belongsTo(AgeRating::class);
    }

    // Связь с избранными
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    // Связь с отзывами
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // Связь с медиа_режиссёрами
    public function mediaDirectors() {
        return $this->hasMany(MediaDirector::class);
    }

    // Связь с медиа_актёрами
    public function mediaActors() {
        return $this->hasMany(MediaActor::class);
    }

    // Связь с медиа_кадрами
    public function mediaFootages() {
        return $this->hasMany(MediaFootage::class);
    }

    // Связь с медиа_жанрами
    public function mediaGenres() {
        return $this->hasMany(MediaGenre::class);
    }
}
