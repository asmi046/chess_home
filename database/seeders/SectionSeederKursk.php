<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class SectionSeederKursk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=> "Сергеева подезд №1",
                'number' => 1,
                'floor_count' => 16,
            ],
            [
                'name'=> "Сергеева подезд №2",
                'number' => 2,
                'floor_count' => 16,
            ],
        ];

        foreach ($data as $item) {
            DB::table("sections")->insert($item);
        }
    }
}
