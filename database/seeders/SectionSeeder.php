<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=> "Секция №1",
                'number' => 1,
                'floor_count' => 9,
            ],
            [
                'name'=> "Секция №2",
                'number' => 2,
                'floor_count' => 9,
            ],
            [
                'name'=> "Секция №3",
                'number' => 3,
                'floor_count' => 9,
            ]
        ];

        foreach ($data as $item) {
            DB::table("sections")->insert($item);
        }
    }
}
