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
            [
                'director_id' => 1,
                'media_id' => 1,
            ],
            [
                'director_id' => 2,
                'media_id' => 2,
            ],
        ]);
    }
}
