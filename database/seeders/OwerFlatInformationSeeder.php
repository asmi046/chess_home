<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OwerFlatInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basePath = public_path('flat_data');

        if (! File::exists($basePath)) {
            return;
        }

        $rows = [];
        $typeByArea = [];

        foreach (File::directories($basePath) as $directoryPath) {
            $directoryName = trim(basename($directoryPath));
            $type = Str::slug($directoryName);

            $gallery = collect(File::files($directoryPath))
                ->filter(function ($file) {
                    return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp'], true);
                })
                ->sortBy(fn ($file) => $file->getFilename())
                ->map(function ($file) use ($directoryName) {
                    return [
                        'image' => $file->getFilename(),
                        'path' => $directoryName.'/'.$file->getFilename(),
                        'title' => '',
                    ];
                })
                ->values()
                ->all();

            $rows[] = [
                'type' => $type,
                'gallery' => json_encode($gallery, JSON_UNESCAPED_UNICODE),
                'address' => 'Республика Крым, Ялта, пос. Гурзуф, пер. Зелёный',
                'city' => 'Гурзуф',
                'country' => 'Россия',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (preg_match('/(\d+[,.]\d+)/u', $directoryName, $matches) === 1) {
                $areaKey = number_format((float) str_replace(',', '.', $matches[1]), 1, '.', '');
                $typeByArea[$areaKey] = $type;
            }
        }

        if (empty($rows)) {
            return;
        }

        DB::table('ower_flat_informations')->upsert(
            $rows,
            ['type'],
            ['gallery', 'address', 'city', 'country', 'updated_at']
        );

        $flats = DB::table('flats')->select('id', 'area3')->get();

        foreach ($flats as $flat) {
            $areaKey = number_format((float) $flat->area3, 1, '.', '');
            $linkedType = $typeByArea[$areaKey] ?? null;

            DB::table('flats')
                ->where('id', $flat->id)
                ->update(['ower_flat_type' => $linkedType]);
        }
    }
}
