<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actors')->insert([
            [
                'surname' => 'Тестовый',
                'name' => 'Актёр',
                'birthday' => '2000-01-01',
                'bio' => 'Текстовая биография',
                'photo' => null,
            ],
            [
                'surname' => 'Тестовый2',
                'name' => 'Актёр2',
                'birthday' => '2000-01-01',
                'bio' => 'Текстовая биография',
                'photo' => null,
            ],
        ]);
    }
}
