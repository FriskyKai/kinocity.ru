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
            [
                'media_id' => 1,
                'photo' => 'https://dummyimage.com/600x400/4a8487/fff.png&text=Test+photo+1',
            ],
            [
                'media_id' => 1,
                'photo' => 'https://dummyimage.com/600x400/035154/fff.png&text=Test+photo+2',
            ],
            [
                'media_id' => 1,
                'photo' => 'https://dummyimage.com/600x400/00873d/fff.png&text=Test+photo+3',
            ],
            [
                'media_id' => 2,
                'photo' => 'https://dummyimage.com/600x400/858500/fff.png&text=Test+photo+1',
            ],
            [
                'media_id' => 2,
                'photo' => 'https://dummyimage.com/600x400/ff7300/fff.png&text=Test+photo+2',
            ],
        ]);
    }
}
