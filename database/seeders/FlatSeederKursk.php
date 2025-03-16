<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class FlatSeederKursk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        include_once "f4.php";
        include_once "f5.php";

        foreach ( $data4 as $item) {
            $item['created_at'] = now();
            $item['created_at'] = now();
            $item['section_id'] = 4;
            $item['price_per_meter'] = 95000;
            $item['price_total'] = round(95000 * $item['area3']);

            $flatID = DB::table("flats")->insertGetId($item);
        }

        foreach ( $data5 as $item) {
            $item['created_at'] = now();
            $item['created_at'] = now();
            $item['section_id'] = 5;
            $item['price_per_meter'] = 95000;
            $item['price_total'] = round(95000 * $item['area3']);

            $flatID = DB::table("flats")->insertGetId($item);
        }

    }
}
