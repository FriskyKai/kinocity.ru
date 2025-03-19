<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media')->insert([
            [
                'name' => 'Тестовый фильм',
                'description' => 'Описание тестового фильма',
                'type' => 0,
                'duration' => 180,
                'release' => '2025-03-19',
                'rating' => 7.5,
                'episodes' => null,
                'preview' => 'https://dummyimage.com/600x400/610061/fff.png&text=Test+preview',
                'contentURL' => 'https://youtu.be/NwFP1NizlN8',
                'studio_id' => 1,
                'age_rating_id' => 1,
            ],
            [
                'name' => 'Тестовый сериал',
                'description' => 'Описание тестового сериала',
                'type' => 1,
                'duration' => 50,
                'release' => '2025-03-19',
                'rating' => 9.0,
                'episodes' => 24,
                'preview' => 'https://dummyimage.com/600x400/610061/fff.png&text=Test+preview',
                'contentURL' => 'https://www.youtube.com/watch?v=gcFpFvtJ0yY&list=PLN_ZsUZ6EwKb1FFQEj-QHR47lTq61rdXe',
                'studio_id' => 1,
                'age_rating_id' => 1,
            ],
        ]);
    }
}
