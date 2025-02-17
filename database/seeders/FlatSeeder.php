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
            $userID = DB::table("flats")->insertGetId($item);
        }

        foreach ( $data2 as $item) {
            $item['created_at'] = now();
            $item['created_at'] = now();
            $item['section_id'] = 2;
            $userID = DB::table("flats")->insertGetId($item);
        }

        foreach ( $data3 as $item) {
            $item['created_at'] = now();
            $item['created_at'] = now();
            $item['section_id'] = 3;
            $userID = DB::table("flats")->insertGetId($item);
        }
    }
}
