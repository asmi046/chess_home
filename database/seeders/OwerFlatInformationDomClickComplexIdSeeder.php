<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwerFlatInformationDomClickComplexIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ower_flat_informations')->update([
            'dom_click_complex_id' => '122005',
            'complex_name' => 'Многофункциональный жилой комплекс «Берег Гурзуфа»',
            'updated_at' => now(),
        ]);
    }
}
