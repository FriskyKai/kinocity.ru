<?php

namespace Database\Seeders;

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
            AgeRatingSeeder::class,
            StudioSeeder::class,
            MediaSeeder::class,
            MediaFootageSeeder::class,
            MediaGenreSeeder::class,
            MediaActorSeeder::class,
            MediaDirectorSeeder::class,
            FavoriteSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
