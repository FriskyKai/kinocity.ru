<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('directors')->insert([
            [
                'surname' => 'Нолан',
                'name' => 'Кристофер',
                'birthday' => '1970-07-30',
                'bio' => 'Британский кинорежиссёр, сценарист и продюсер',
                'photo' => 'assets/images/photos/cristofernolan.jpg',
            ],
            [
                'surname' => 'Тестовый2',
                'name' => 'Режиссёр2',
                'birthday' => '2000-01-01',
                'bio' => 'Текстовая биография',
                'photo' => null,
            ],
        ]);
    }
}
