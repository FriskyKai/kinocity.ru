<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaDirectorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media_directors')->insert([
            // Кристофер Нолан
            ['director_id' => 1, 'media_id' => 1],
            ['director_id' => 1, 'media_id' => 4],
            ['director_id' => 1, 'media_id' => 6],
            ['director_id' => 1, 'media_id' => 18],

            // Джеймс Кэмерон
            ['director_id' => 2, 'media_id' => 2],
            ['director_id' => 2, 'media_id' => 5],

            // Квентин Тарантино
            ['director_id' => 3, 'media_id' => 3],
            ['director_id' => 3, 'media_id' => 13],
            ['director_id' => 3, 'media_id' => 14],
        ]);
    }
}
