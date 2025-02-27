<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        include_once "f1.php";
        include_once "f2.php";
        include_once "f3.php";

        foreach ( $data1 as $item) {
            $item['created_at'] = now();
            $item['created_at'] = now();
            $item['section_id'] = 1;

            $flatID = DB::table("flats")->insertGetId($item);

            if (rand(0,1))
            {
                DB::table("fixations")->insertGetId([
                    'created_at' => now(),
                    'updated_at' => now(),
                   'user_id' => rand(1,3),
                   'flat_id' => $flatID,
                   'type' => (rand(0,1))?"Забронирована":"Продана",
                   'client_name' => 'Иванов',
                   'price' => $item['price_total'],
                ]);
            }
        }

        foreach ( $data2 as $item) {
            $item['created_at'] = now();
            $item['created_at'] = now();
            $item['section_id'] = 2;

            $flatID = DB::table("flats")->insertGetId($item);

            if (rand(0,1))
            {
                DB::table("fixations")->insertGetId([
                    'created_at' => now(),
                    'updated_at' => now(),
                    'user_id' => rand(1,3),
                    'flat_id' => $flatID,
                    'type' => (rand(0,1))?"Забронирована":"Продана",
                    'client_name' => 'Иванов',
                    'price' => $item['price_total'],
                ]);
            }
        }

        foreach ( $data3 as $item) {
            $item['created_at'] = now();
            $item['created_at'] = now();
            $item['section_id'] = 3;

            $flatID = DB::table("flats")->insertGetId($item);

            if (rand(0,1))
            {
                DB::table("fixations")->insertGetId([
                    'created_at' => now(),
                    'updated_at' => now(),
                   'user_id' => rand(1,3),
                   'flat_id' => $flatID,
                   'type' => (rand(0,1))?"Забронирована":"Продана",
                   'client_name' => 'Иванов',
                   'price' => $item['price_total'],
                ]);
            }
        }
    }
}
