<?php

namespace Database\Seeders;

use App\Models\AgeRating;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ActorSeeder::class,
            DirectorSeeder::class,
            GenreSeeder::class,
            AgeRating::class,
            StudioSeeder::class,
        ]);
    }
}
