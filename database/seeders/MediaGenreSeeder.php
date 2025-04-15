<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaGenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media_genres')->insert([
            // Начало
            ['media_id' => 1, 'genre_id' => 1],
            ['media_id' => 1, 'genre_id' => 5],
            ['media_id' => 1, 'genre_id' => 7],

            // Аватар
            ['media_id' => 2, 'genre_id' => 1],
            ['media_id' => 2, 'genre_id' => 7],
            ['media_id' => 2, 'genre_id' => 8],

            // Криминальное чтиво
            ['media_id' => 3, 'genre_id' => 1],
            ['media_id' => 3, 'genre_id' => 3],
            ['media_id' => 3, 'genre_id' => 2],

            // Тёмный рыцарь
            ['media_id' => 4, 'genre_id' => 1],
            ['media_id' => 4, 'genre_id' => 5],
            ['media_id' => 4, 'genre_id' => 7],

            // Титаник
            ['media_id' => 5, 'genre_id' => 3],
            ['media_id' => 5, 'genre_id' => 4],

            // Интерстеллар
            ['media_id' => 6, 'genre_id' => 3],
            ['media_id' => 6, 'genre_id' => 7],

            // Матрица
            ['media_id' => 7, 'genre_id' => 1],
            ['media_id' => 7, 'genre_id' => 7],

            // Форрест Гамп
            ['media_id' => 8, 'genre_id' => 3],
            ['media_id' => 8, 'genre_id' => 2],

            // Бойцовский клуб
            ['media_id' => 9, 'genre_id' => 3],
            ['media_id' => 9, 'genre_id' => 5],

            // Пираты Карибского моря
            ['media_id' => 10, 'genre_id' => 1],
            ['media_id' => 10, 'genre_id' => 8],

            // Гарри Поттер и философский камень
            ['media_id' => 11, 'genre_id' => 8],
            ['media_id' => 11, 'genre_id' => 3],

            // Властелин колец: Братство кольца
            ['media_id' => 12, 'genre_id' => 1],
            ['media_id' => 12, 'genre_id' => 8],

            // Джанго освобождённый
            ['media_id' => 13, 'genre_id' => 1],
            ['media_id' => 13, 'genre_id' => 3],
            ['media_id' => 13, 'genre_id' => 2],

            // Однажды в Голливуде
            ['media_id' => 14, 'genre_id' => 3],
            ['media_id' => 14, 'genre_id' => 2],

            // Достать ножи
            ['media_id' => 15, 'genre_id' => 9],
            ['media_id' => 15, 'genre_id' => 2],

            // Дюна
            ['media_id' => 16, 'genre_id' => 1],
            ['media_id' => 16, 'genre_id' => 7],

            // Человек-паук: Нет пути домой
            ['media_id' => 17, 'genre_id' => 1],
            ['media_id' => 17, 'genre_id' => 7],
            ['media_id' => 17, 'genre_id' => 8],

            // Оппенгеймер
            ['media_id' => 18, 'genre_id' => 3],
            ['media_id' => 18, 'genre_id' => 5],

            // Барби
            ['media_id' => 19, 'genre_id' => 2],
            ['media_id' => 19, 'genre_id' => 4],
            ['media_id' => 19, 'genre_id' => 7],

            // Джон Уик 4
            ['media_id' => 20, 'genre_id' => 1],
            ['media_id' => 20, 'genre_id' => 5],
        ]);
    }
}
