<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = [
        'name',
    ];

    // Связь с медиакаталогом
    public function mediaCatalog() {
        return $this->hasMany(Media::class);
    }
}
