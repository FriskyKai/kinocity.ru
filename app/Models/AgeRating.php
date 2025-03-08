<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeRating extends Model
{
    protected $fillable = [
        'age',
    ];

    // Связь с медиакаталогом
    public function mediaCatalog() {
        return $this->hasMany(Media::class);
    }
}
