<?php
namespace App\Services;

use App\Models\Log;
use App\Models\Flat;
use Illuminate\Support\Str;


class LogServices {

    public function write(string $action, string $ip, Flat $flat = null) {
        $adet_data= [
            'event_name' => $action,
            'ip' => $ip,
            'user_name' => auth()->user()->name ?? "Робот",
            'user_id' => auth()->user()->id ?? 1,
            'user_email' => auth()->user()->email ?? "mail@mail.ru",
            'user_phone' => auth()->user()->phone ?? "+7 (000) 000-00-00",
        ];


        if ($flat) {
            $adet_data['section_id'] = $flat->section->id ?? null;
            $adet_data['section_name'] = $flat->section->name ?? null;

            $adet_data['flat_number'] = $flat->number;
            $adet_data['flat_type'] = $flat->type;
            $adet_data['flat_price'] = $flat->price_total;

            $adet_data['client_name'] = $flat->fixation->client_name ?? null;
            $adet_data['client_phone'] = $flat->fixation->client_phone ?? null;
            $adet_data['fixation_comment'] = $flat->fixation->comment ?? null;
            $adet_data['fixation_ddu'] = $flat->fixation->ddu ?? null;
            $adet_data['fixation_price'] = $flat->fixation->price ?? null;
        }

        return Log::create($adet_data);
    }

}
