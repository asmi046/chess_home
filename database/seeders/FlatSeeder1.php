<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class FlatSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 1,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 0,
                'price_total' => 10629000
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 2,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 0,
                'price_total' => 7603040
            ],
        ];
    }
}
