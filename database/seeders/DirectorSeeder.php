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
                'photo' => 'assets/images/photos/directors/cristofernolan.jpg',
            ],
            [
                'surname' => 'Кэмерон',
                'name' => 'Джеймс',
                'birthday' => '1954-08-16',
                'bio' => 'Канадский режиссёр, создатель "Титаника" и "Аватара"',
                'photo' => 'assets/images/photos/directors/kemeron.jpg',
            ],
            [
                'surname' => 'Тарантино',
                'name' => 'Квентин',
                'birthday' => '1963-03-27',
                'bio' => 'Американский режиссёр, сценарист и актёр',
                'photo' => 'assets/images/photos/directors/tarantino.jpg',
            ],
            [
                'surname' => 'Скорсезе',
                'name' => 'Мартин',
                'birthday' => '1942-11-17',
                'bio' => 'Американский режиссёр, продюсер и сценарист',
                'photo' => 'assets/images/photos/directors/scorcese.jpg',
            ],
            [
                'surname' => 'Бертон',
                'name' => 'Тим',
                'birthday' => '1958-08-25',
                'bio' => 'Американский режиссёр, продюсер и мультипликатор',
                'photo' => 'assets/images/photos/directors/berton.jpg',
            ],
        ]);
    }
}
