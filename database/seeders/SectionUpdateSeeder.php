<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder; // Added Model import for clarity and safety

class SectionUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionsToUpdate = [
            'Секция №1' => 4004357,
            'Секция №2' => 4004358,
            'Секция №3' => 4004359,
        ];

        // Update records where the name is in the specified list.
        Section::whereIn('name', array_keys($sectionsToUpdate))->update([
            'yn_project_id' => 4004351,
            // Use CASE statement to map the name to the correct yn_section_id
            'yn_section_id' => \DB::raw("CASE name WHEN 'Секция №1' THEN 4004357 WHEN 'Секция №2' THEN 4004358 WHEN 'Секция №3' THEN 4004359 END"),
        ]);
    }
}
