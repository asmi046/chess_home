<?php

namespace App\Console\Commands;

use App\Models\Fixation;
use App\Services\LogServices;
use Illuminate\Console\Command;

class ClearFixation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chess:clear-fixation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Очистка брони';

    protected function dey_count_calc(string $d1, string $d2)
    {
        $d1_ts = strtotime($d1);
        $d2_ts = strtotime($d2);

        $seconds = $d1_ts - $d2_ts;

        return floor($seconds / 86400);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fixation = Fixation::with('flat')->where('type', "Забронирована")->get();
        $this->info("Найдено ".count($fixation)." забронированных квартир");
        $this->info("Начата проверка срока брони:");

        $ls = new LogServices();

        $index = 1;
        $deleted = 0;
        foreach($fixation as $item) {
            $deycount = $this->dey_count_calc(date("Y-m-d H:i:s"), $item->created_at);
            $this->line("#".$index." Проверяем бронь: ".$item->client_name)." от ".date("d.m.Y", strtotime($item->created_at))." дней ".$deycount;

            if ($deycount >= 15) {
                $ls->write("Бронь снята роботом", "127.0.0.1", flat:$item->flat);
                $item->delete();
                $deleted++;
                $this->error("Бронь удалена");
            } else {
                $this->info("Бронь актуальна");
            }

            $index++;
        }
        $this->line("");
        $this->info("Удалено ".$deleted." из ".count($fixation));
    }
}
