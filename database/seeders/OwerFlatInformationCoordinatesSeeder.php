<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwerFlatInformationCoordinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ower_flat_informations')->update([
            'latitude' => '44.548832',
            'longitude' => '34.276384',
            'address' => 'Республика Крым, Ялта, пос. Гурзуф, пер. Зелёный',
            'updated_at' => now(),
        ]);
    }
}
