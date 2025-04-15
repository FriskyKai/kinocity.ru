<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaActorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('media_actors')->insert([
            // ДиКаприо
            ['actor_id' => 1, 'media_id' => 1],
            ['actor_id' => 1, 'media_id' => 5],
            ['actor_id' => 1, 'media_id' => 13],
            ['actor_id' => 1, 'media_id' => 14],

            // Питт
            ['actor_id' => 2, 'media_id' => 9],
            ['actor_id' => 2, 'media_id' => 14],

            // Харди
            ['actor_id' => 4, 'media_id' => 1],
            ['actor_id' => 4, 'media_id' => 4],

            // Уотсон
            ['actor_id' => 7, 'media_id' => 11],

            // Депп
            ['actor_id' => 10, 'media_id' => 10],
        ]);
    }
}
