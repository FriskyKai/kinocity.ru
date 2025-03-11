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
                'surname' => 'Тестовый',
                'name' => 'Режиссёр',
                'birthday' => '2000-01-01',
                'bio' => 'Текстовая биография',
                'photo' => null,
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
