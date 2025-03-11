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
                'name' => 'A-1 Pictures',
            ],
            [
                'name' => 'Wit Studio',
            ],
            [
                'name' => 'MAPPA',
            ],
            [
                'name' => 'Warner Bros',
            ],
            [
                'name' => 'Sony Pictures',
            ],
            [
                'name' => 'DreamWorks',
            ],
        ]);
    }
}
