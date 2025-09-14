<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class ParcingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=> "Ялта паркинг",
                'number' => 7,
                'floor_count' => 1,
                'type' => "Паркинг",
            ],

        ];

        foreach ($data as $item) {
            DB::table("sections")->insert($item);
        }

        include_once "p6.php";

        foreach ( $data6 as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            $item['section_id'] = 6;

            if ( $item['type'] === "Кладовая для хранения автомобильных шин") {
                $item['price_per_meter'] = round($item['price_total'] / $item['area1'], 2);
            }

            $flatID = DB::table("flats")->insertGetId($item);
        }
    }
}
