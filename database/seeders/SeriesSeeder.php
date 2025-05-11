<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('series')->insert([
            [
                'media_id' => 21,
                'series_number' => 1,
                'url' => 'https://vk.com/video-185087421_456241704',
            ],
            [
                'media_id' => 21,
                'series_number' => 2,
                'url' => 'https://vk.com/video-185087421_456241705',
            ],
            [
                'media_id' => 21,
                'series_number' => 3,
                'url' => 'https://vk.com/video-185087421_456241706',
            ],
            [
                'media_id' => 21,
                'series_number' => 4,
                'url' => 'https://vk.com/video-185087421_456241707',
            ],
            [
                'media_id' => 21,
                'series_number' => 5,
                'url' => 'https://vk.com/video-185087421_456241708',
            ],
        ]);
    }
}
