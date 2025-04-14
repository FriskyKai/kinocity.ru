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
                'name' => 'Боевик',
            ],
            [
                'name' => 'Комедия',
            ],
            [
                'name' => 'Драма',
            ],
            [
                'name' => 'Мелодрама',
            ],
            [
                'name' => 'Триллер',
            ],
            [
                'name' => 'Ужасы',
            ],
            [
                'name' => 'Фантастика',
            ],
            [
                'name' => 'Фэнтези',
            ],
            [
                'name' => 'Детектив',
            ],
            [
                'name' => 'Анимация',
            ],
        ]);
    }
}
