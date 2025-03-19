<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaGenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media_genres')->insert([
            [
                'genre_id' => 1,
                'media_id' => 1,
            ],
            [
                'genre_id' => 2,
                'media_id' => 1,
            ],
            [
                'genre_id' => 5,
                'media_id' => 1,
            ],
            [
                'genre_id' => 8,
                'media_id' => 1,
            ],
            [
                'genre_id' => 1,
                'media_id' => 2,
            ],
            [
                'genre_id' => 3,
                'media_id' => 2,
            ],
            [
                'genre_id' => 8,
                'media_id' => 2,
            ],
        ]);
    }
}
