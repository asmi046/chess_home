<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class FlatSeeder2 extends Seeder
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
                'price_per_meter' => 210059 ,
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
                'price_per_meter' => 210028,
                'price_total' => 7603040
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 3,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 230056,
                'price_total' => 8190000
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 4,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 220135,
                'price_total' => 11050780
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 5,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 240287,
                'price_total' => 7352800
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 6,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 240690,
                'price_total' => 7629900
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 7,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 199756,
                'price_total' => 12364950
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 8,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 240038,
                'price_total' => 7417200
            ],
            [
                'state' => "Свободна",
                'floor' => 2,
                'number' => 9,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 199853,
                'price_total' => 12830580
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 10,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 220001,
                'price_total' => 12830580
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 11,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 220358,
                'price_total' => 7976960
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 12,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 240168,
                'price_total' => 8550000
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 13,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 229938,
                'price_total' => 11542920
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 14,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 240287,
                'price_total' => 7352800
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 15,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 249820,
                'price_total' => 7919310
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 16,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 210151,
                'price_total' => 13008375
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 17,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 240038,
                'price_total' => 7417200
            ],
            [
                'state' => "Свободна",
                'floor' => 3,
                'number' => 18,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 220006,
                'price_total' => 14124420
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 19,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 229926,
                'price_total' => 14124420
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 20,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 220358,
                'price_total' => 7976960
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 21,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 250280,
                'price_total' => 8910000
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 22,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 240187,
                'price_total' => 8910000
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 23,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 250585,
                'price_total' => 7667920
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 24,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 259780,
                'price_total' => 8235030
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 25,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 220546,
                'price_total' => 13651800
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 26,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 250326,
                'price_total' => 7735080
            ],
            [
                'state' => "Свободна",
                'floor' => 4,
                'number' => 27,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 230083,
                'price_total' => 14771340
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 28,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 229926,
                'price_total' => 11634300
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 29,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 240155,
                'price_total' => 8693640
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 30,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 259971,
                'price_total' => 9255000
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 31,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 240633,
                'price_total' => 12079800
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 32,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 260025,
                'price_total' => 7956780
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 33,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 259780,
                'price_total' => 8235030
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 34,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 220094,
                'price_total' => 13623825
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 35,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 270043,
                'price_total' => 8344350
            ],
            [
                'state' => "Свободна",
                'floor' => 5,
                'number' => 36,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 240159,
                'price_total' => 15418260
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 37,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 239851,
                'price_total' => 12136500
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 38,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 250054,
                'price_total' => 9051980
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 39,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 270084,
                'price_total' => 9615000
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 40,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 249991,
                'price_total' => 12549570
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 41,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 270323,
                'price_total' => 8271900
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 42,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 270154,
                'price_total' => 8271900
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 43,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 229584,
                'price_total' => 14211300
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 44,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 270043,
                'price_total' => 8344350
            ],
            [
                'state' => "Свободна",
                'floor' => 6,
                'number' => 45,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 250236,
                'price_total' => 16065180
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 46,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 249776,
                'price_total' => 12638700
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 47,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 259953,
                'price_total' => 9410320
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 48,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 280617,
                'price_total' => 9990000
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 49,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 260240,
                'price_total' => 9990000
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 50,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 280621,
                'price_total' => 8587020
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 51,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 270567,
                'price_total' => 8577000
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 52,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 230488,
                'price_total' => 14267250
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 53,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 270043,
                'price_total' => 8344350
            ]
            [
                'state' => "Свободна",
                'floor' => 7,
                'number' => 54,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 250236,
                'price_total' => 16065180
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 55,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 260528,
                'price_total' => 13182750
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 56,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 270282,
                'price_total' => 9784240
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 57,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 290730,
                'price_total' => 10350000
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 58,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 270044,
                'price_total' => 13556220
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 59,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 285770,
                'price_total' => 8744580
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 60,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 280529,
                'price_total' => 8892780
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 61,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 240431,
                'price_total' => 14882700
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 62,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 291475,
                'price_total' => 9006600
            ]
            [
                'state' => "Свободна",
                'floor' => 8,
                'number' => 63,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 260313,
                'price_total' => 16712100
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 64,
                'type' => "Е2",
                'area1' => 21.5,
                'area2' => 38.1,
                'area3' => 50.6,
                'price_per_meter' => 270453,
                'price_total' => 13684950
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 65,
                'type' => "1 комнотная",
                'area1' => 11.3,
                'area2' => 29.0,
                'area3' => 36.2,
                'price_per_meter' => 280612,
                'price_total' => 10158160
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 66,
                'type' => "Студия",
                'area1' => 12.6,
                'area2' => 27.6,
                'area3' => 35.6,
                'price_per_meter' => 300000,
                'price_total' => 10680000
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 67,
                'type' => "Е2",
                'area1' => 29.2,
                'area2' => 42.4,
                'area3' => 50.2,
                'price_per_meter' => 280739,
                'price_total' => 14093100
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 68,
                'type' => "Студия",
                'area1' => 9.9,
                'area2' => 24.4,
                'area3' => 30.6,
                'price_per_meter' => 300359,
                'price_total' => 9191000
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 69,
                'type' => "Студия",
                'area1' => 13.0,
                'area2' => 24.0,
                'area3' => 31.7,
                'price_per_meter' => 290488,
                'price_total' => 9208500
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 70,
                'type' => "Е3",
                'area1' => 34.3,
                'area2' => 53.4,
                'area3' => 61.9,
                'price_per_meter' => 250373,
                'price_total' => 15498150
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 71,
                'type' => "Студия",
                'area1' => 13.8,
                'area2' => 24.6,
                'area3' => 30.9,
                'price_per_meter' => 300564,
                'price_total' => 9287430
            ]
            [
                'state' => "Свободна",
                'floor' => 9,
                'number' => 72,
                'type' => "Е2",
                'area1' => 29.7,
                'area2' => 49.5,
                'area3' => 64.2,
                'price_per_meter' => 270389,
                'price_total' => 17359020
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 73,
                'type' => "Е2",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 14103450
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 74,
                'type' => "1 комнотная",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 10469760
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 75,
                'type' => "Студия",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 10980000
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 76,
                'type' => "Е2",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 14540500
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 77,
                'type' => "Студия",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 9453600
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 78,
                'type' => "Студия",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 9471600
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 79,
                'type' => "Е3",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 16057650
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 80,
                'type' => "Студия",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 9615870
            ]
            [
                'state' => "Свободна",
                'floor' => 10,
                'number' => 81,
                'type' => "Е2",
                'area1' => ,
                'area2' => ,
                'area3' => ,
                'price_per_meter' => ,
                'price_total' => 17898120
            ]
        ];
    }
}
