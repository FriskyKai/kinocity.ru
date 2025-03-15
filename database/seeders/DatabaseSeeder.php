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
        ]);
    }
}
