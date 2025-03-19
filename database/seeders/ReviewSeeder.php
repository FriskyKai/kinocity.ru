<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'user_id' => 1,
                'media_id' => 1,
                'text' => 'Тестовый комментарий!',
                'rating' => 10,
            ],
            [
                'user_id' => 1,
                'media_id' => 2,
                'text' => 'Тестовый второй комментарий!',
                'rating' => 2,
            ],
            [
                'user_id' => 2,
                'media_id' => 1,
                'text' => 'Тестовый ещё комментарий!',
                'rating' => 5,
            ],
            [
                'user_id' => 2,
                'media_id' => 2,
                'text' => 'Тестовый супер комментарий!',
                'rating' => 7,
            ],
        ]);
    }
}
