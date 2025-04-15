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
                'name' => '20th Century Studios',
            ],
            [
                'name' => 'Paramount Pictures',
            ],
            [
                'name' => 'Walt Disney Studios Motion Pictures',
            ],
            [
                'name' => 'Sony Pictures Entertainment',
            ],
            [
                'name' => 'Universal Studios',
            ],
            [
                'name' => 'Netflix',
            ],
            [
                'name' => 'Lionsgate',
            ],
            [
                'name' => 'Columbia Pictures',
            ],
            [
                'name' => 'DreamWorks',
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
