<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaFootageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media_footages')->insert([
            // Начало
            [
                'media_id' => 1,
                'photo' => asset('assets/images/photos/footages/begin/frame1.jpg'),
            ],
            [
                'media_id' => 1,
                'photo' => asset('assets/images/photos/footages/begin/frame2.jpg'),
            ],
            [
                'media_id' => 1,
                'photo' => asset('assets/images/photos/footages/begin/frame3.jpg'),
            ],
            [
                'media_id' => 1,
                'photo' => asset('assets/images/photos/footages/begin/frame4.jpg'),
            ],

            // Аватар
            [
                'media_id' => 2,
                'photo' => asset('assets/images/photos/footages/avatar/frame1.jpg'),
            ],
            [
                'media_id' => 2,
                'photo' => asset('assets/images/photos/footages/avatar/frame2.jpg'),
            ],
            [
                'media_id' => 2,
                'photo' => asset('assets/images/photos/footages/avatar/frame3.jpg'),
            ],
            [
                'media_id' => 2,
                'photo' => asset('assets/images/photos/footages/avatar/frame4.jpg'),
            ],
            [
                'media_id' => 2,
                'photo' => asset('assets/images/photos/footages/avatar/frame5.jpg'),
            ],

            // Криминальное чтиво
            [
                'media_id' => 3,
                'photo' => asset('assets/images/photos/footages/criminalfiction/frame1.jpg'),
            ],
            [
                'media_id' => 3,
                'photo' => asset('assets/images/photos/footages/criminalfiction/frame2.jpg'),
            ],
            [
                'media_id' => 3,
                'photo' => asset('assets/images/photos/footages/criminalfiction/frame3.jpg'),
            ],
            [
                'media_id' => 3,
                'photo' => asset('assets/images/photos/footages/criminalfiction/frame4.jpg'),
            ],

            // Тёмный рыцарь
            [
                'media_id' => 4,
                'photo' => asset('assets/images/photos/footages/darkknight/frame1.jpg'),
            ],
            [
                'media_id' => 4,
                'photo' => asset('assets/images/photos/footages/darkknight/frame2.jpg'),
            ],
            [
                'media_id' => 4,
                'photo' => asset('assets/images/photos/footages/darkknight/frame3.jpg'),
            ],

            // Титаник
            [
                'media_id' => 5,
                'photo' => asset('assets/images/photos/footages/titanik/frame1.jpg'),
            ],
            [
                'media_id' => 5,
                'photo' => asset('assets/images/photos/footages/titanik/frame2.jpg'),
            ],
            [
                'media_id' => 5,
                'photo' => asset('assets/images/photos/footages/titanik/frame3.jpg'),
            ],

            // Интерстеллар
            [
                'media_id' => 6,
                'photo' => asset('assets/images/photos/footages/interstellar/frame1.jpg'),
            ],
            [
                'media_id' => 6,
                'photo' => asset('assets/images/photos/footages/interstellar/frame2.jpg'),
            ],
            [
                'media_id' => 6,
                'photo' => asset('assets/images/photos/footages/interstellar/frame3.jpg'),
            ],
            [
                'media_id' => 6,
                'photo' => asset('assets/images/photos/footages/interstellar/frame4.jpg'),
            ],

            // Матрица
            [
                'media_id' => 7,
                'photo' => asset('assets/images/photos/footages/matrix/frame1.jpg'),
            ],
            [
                'media_id' => 7,
                'photo' => asset('assets/images/photos/footages/matrix/frame2.jpg'),
            ],
            [
                'media_id' => 7,
                'photo' => asset('assets/images/photos/footages/matrix/frame3.jpg'),
            ],

            // Форрест Гамп
            [
                'media_id' => 8,
                'photo' => asset('assets/images/photos/footages/forestgump/frame1.jpg'),
            ],
            [
                'media_id' => 8,
                'photo' => asset('assets/images/photos/footages/forestgump/frame2.jpg'),
            ],
            [
                'media_id' => 8,
                'photo' => asset('assets/images/photos/footages/forestgump/frame3.jpg'),
            ],
            [
                'media_id' => 8,
                'photo' => asset('assets/images/photos/footages/forestgump/frame4.jpg'),
            ],
            [
                'media_id' => 8,
                'photo' => asset('assets/images/photos/footages/forestgump/frame5.jpg'),
            ],

            // Бойцовский клуб
            [
                'media_id' => 9,
                'photo' => asset('assets/images/photos/footages/fightclub/frame1.jpg'),
            ],
            [
                'media_id' => 9,
                'photo' => asset('assets/images/photos/footages/fightclub/frame2.jpg'),
            ],
            [
                'media_id' => 9,
                'photo' => asset('assets/images/photos/footages/fightclub/frame3.jpg'),
            ],

            // Пираты Карибского моря
            [
                'media_id' => 10,
                'photo' => asset('assets/images/photos/footages/caribbean/frame1.jpg'),
            ],
            [
                'media_id' => 10,
                'photo' => asset('assets/images/photos/footages/caribbean/frame2.jpg'),
            ],
            [
                'media_id' => 10,
                'photo' => asset('assets/images/photos/footages/caribbean/frame3.jpg'),
            ],

            // Гарри Поттер и философский камень
            [
                'media_id' => 11,
                'photo' => asset('assets/images/photos/footages/harrypotter/frame1.jpg'),
            ],
            [
                'media_id' => 11,
                'photo' => asset('assets/images/photos/footages/harrypotter/frame2.jpg'),
            ],
            [
                'media_id' => 11,
                'photo' => asset('assets/images/photos/footages/harrypotter/frame3.jpg'),
            ],
            [
                'media_id' => 11,
                'photo' => asset('assets/images/photos/footages/harrypotter/frame4.jpg'),
            ],

            // Властелин колец: Братство кольца
            [
                'media_id' => 12,
                'photo' => asset('assets/images/photos/footages/lotr/frame1.jpg'),
            ],
            [
                'media_id' => 12,
                'photo' => asset('assets/images/photos/footages/lotr/frame2.jpg'),
            ],
            [
                'media_id' => 12,
                'photo' => asset('assets/images/photos/footages/lotr/frame3.jpg'),
            ],

            // Джанго освобождённый
            [
                'media_id' => 13,
                'photo' => asset('assets/images/photos/footages/jango/frame1.jpg'),
            ],
            [
                'media_id' => 13,
                'photo' => asset('assets/images/photos/footages/jango/frame2.jpg'),
            ],
            [
                'media_id' => 13,
                'photo' => asset('assets/images/photos/footages/jango/frame3.jpg'),
            ],

            // Однажды в Голливуде
            [
                'media_id' => 14,
                'photo' => asset('assets/images/photos/footages/hollywood/frame1.jpg'),
            ],
            [
                'media_id' => 14,
                'photo' => asset('assets/images/photos/footages/hollywood/frame2.jpg'),
            ],
            [
                'media_id' => 14,
                'photo' => asset('assets/images/photos/footages/hollywood/frame3.jpg'),
            ],

            // Достать ножи
            [
                'media_id' => 15,
                'photo' => asset('assets/images/photos/footages/knivesout/frame1.jpg'),
            ],
            [
                'media_id' => 15,
                'photo' => asset('assets/images/photos/footages/knivesout/frame2.jpg'),
            ],
            [
                'media_id' => 15,
                'photo' => asset('assets/images/photos/footages/knivesout/frame3.jpg'),
            ],

            // Дюна
            [
                'media_id' => 16,
                'photo' => asset('assets/images/photos/footages/duna/frame1.jpg'),
            ],
            [
                'media_id' => 16,
                'photo' => asset('assets/images/photos/footages/duna/frame2.jpg'),
            ],
            [
                'media_id' => 16,
                'photo' => asset('assets/images/photos/footages/duna/frame3.jpg'),
            ],

            // Человек-паук: Нет пути домой
            [
                'media_id' => 17,
                'photo' => asset('assets/images/photos/footages/spiderman/frame1.jpg'),
            ],
            [
                'media_id' => 17,
                'photo' => asset('assets/images/photos/footages/spiderman/frame2.jpg'),
            ],
            [
                'media_id' => 17,
                'photo' => asset('assets/images/photos/footages/spiderman/frame3.jpg'),
            ],

            // Оппенгеймер
            [
                'media_id' => 18,
                'photo' => asset('assets/images/photos/footages/oppengeimer/frame1.jpg'),
            ],
            [
                'media_id' => 18,
                'photo' => asset('assets/images/photos/footages/oppengeimer/frame2.jpg'),
            ],
            [
                'media_id' => 18,
                'photo' => asset('assets/images/photos/footages/oppengeimer/frame3.jpg'),
            ],

            // Барби
            [
                'media_id' => 19,
                'photo' => asset('assets/images/photos/footages/barbie/frame1.jpg'),
            ],
            [
                'media_id' => 19,
                'photo' => asset('assets/images/photos/footages/barbie/frame2.jpg'),
            ],
            [
                'media_id' => 19,
                'photo' => asset('assets/images/photos/footages/barbie/frame3.jpg'),
            ],

            // Джон Уик 4
            [
                'media_id' => 20,
                'photo' => asset('assets/images/photos/footages/johnwick/frame1.jpg'),
            ],
            [
                'media_id' => 20,
                'photo' => asset('assets/images/photos/footages/johnwick/frame2.jpg'),
            ],
            [
                'media_id' => 20,
                'photo' => asset('assets/images/photos/footages/johnwick/frame3.jpg'),
            ],
            [
                'media_id' => 20,
                'photo' => asset('assets/images/photos/footages/johnwick/frame4.jpg'),
            ],
        ]);
    }
}
