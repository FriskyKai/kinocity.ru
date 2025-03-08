<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'role_id',
        'surname',
        'name',
        'email',
        'password',
        'birthday',
        'avatar',
        'api_token',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'api_token',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Связь с ролью
    public function role() {
        return $this->belongsTo(Role::class);
    }

    // Связь с отзывами
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // Связь с избранными
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}
