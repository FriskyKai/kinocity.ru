<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('favorites')->insert([
            [
                'user_id' => 1,
                'media_id' => 1,
                'date' => '2000-01-01',
            ],
            [
                'user_id' => 1,
                'media_id' => 2,
                'date' => '2000-01-01',
            ],
            [
                'user_id' => 2,
                'media_id' => 1,
                'date' => '2000-01-02',
            ],
            [
                'user_id' => 2,
                'media_id' => 2,
                'date' => '2000-01-02',
            ],
        ]);
    }
}
