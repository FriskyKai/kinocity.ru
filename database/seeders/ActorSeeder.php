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
                'surname' => 'ДиКаприо',
                'name' => 'Леонардо',
                'birthday' => '1974-11-11',
                'bio' => 'Американский актёр и продюсер',
                'photo' => 'assets/images/photos/actors/leodikaprio.jpg',
            ],
            [
                'surname' => 'Питт',
                'name' => 'Брэд',
                'birthday' => '1963-12-18',
                'bio' => 'Американский актёр и продюсер',
                'photo' => 'assets/images/photos/actors/breadpitt.jpg',
            ],
            [
                'surname' => 'Джоли',
                'name' => 'Анджелина',
                'birthday' => '1975-06-04',
                'bio' => 'Американская актриса и режиссёр',
                'photo' => 'assets/images/photos/actors/angelinajoli.jpg',
            ],
            [
                'surname' => 'Харди',
                'name' => 'Том',
                'birthday' => '1977-09-15',
                'bio' => 'Британский актёр и продюсер',
                'photo' => 'assets/images/photos/actors/tomhardi.jpg',
            ],
            [
                'surname' => 'Робертс',
                'name' => 'Джулия',
                'birthday' => '1967-10-28',
                'bio' => 'Американская актриса и продюсер',
                'photo' => 'assets/images/photos/actors/jouliarobert.jpg',
            ],
            [
                'surname' => 'Смит',
                'name' => 'Уилл',
                'birthday' => '1968-09-25',
                'bio' => 'Американский актёр и рэпер',
                'photo' => 'assets/images/photos/actors/willsmit.jpg',
            ],
            [
                'surname' => 'Уотсон',
                'name' => 'Эмма',
                'birthday' => '1990-04-15',
                'bio' => 'Британская актриса и модель',
                'photo' => 'assets/images/photos/actors/emmawotson.jpg',
            ],
            [
                'surname' => 'Хемсворт',
                'name' => 'Крис',
                'birthday' => '1983-08-11',
                'bio' => 'Австралийский актёр',
                'photo' => 'assets/images/photos/actors/chrishemsvort.jpg',
            ],
            [
                'surname' => 'Лоуренс',
                'name' => 'Дженнифер',
                'birthday' => '1990-08-15',
                'bio' => 'Американская актриса',
                'photo' => 'assets/images/photos/actors/jenniferlourens.jpg',
            ],
            [
                'surname' => 'Депп',
                'name' => 'Джонни',
                'birthday' => '1963-06-09',
                'bio' => 'Американский актёр и музыкант',
                'photo' => 'assets/images/photos/actors/jonniedepp.jpg',
            ],
        ]);
    }
}
