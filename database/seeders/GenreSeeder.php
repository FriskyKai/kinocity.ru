<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'Фантастика',
            ],
            [
                'name' => 'Фэнтези',
            ],
            [
                'name' => 'Триллер',
            ],
            [
                'name' => 'Хоррор',
            ],
            [
                'name' => 'Повседневность',
            ],
            [
                'name' => 'Боевик',
            ],
            [
                'name' => 'Драма',
            ],
            [
                'name' => 'Комедия',
            ],
        ]);
    }
}
