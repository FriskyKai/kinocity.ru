<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('studios')->insert([
            [
                'name' => 'Warner Bros. Pictures',
            ],
            [
                'name' => 'Sony Pictures Entertainment',
            ],
            [
                'name' => 'Walt Disney Studios Motion Pictures',
            ],
            [
                'name' => 'DreamWorks',
            ],
            [
                'name' => 'Universal Studios',
            ],
            [
                'name' => 'Paramount Pictures',
            ],
            [
                'name' => 'A-1 Pictures',
            ],
            [
                'name' => 'Wit Studio',
            ],
            [
                'name' => 'MAPPA',
            ],
        ]);
    }
}
