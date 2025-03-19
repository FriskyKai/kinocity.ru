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
            [
                'actor_id' => 1,
                'media_id' => 1,
            ],
            [
                'actor_id' => 1,
                'media_id' => 2,
            ],
            [
                'actor_id' => 2,
                'media_id' => 2,
            ],
        ]);
    }
}
