<?php
namespace App\Services;

use App\Models\Flat;
use Illuminate\Support\Str;


class FixationServices {

    public function get_action_list_by_flat(Flat $flat) {
        $fixationType = $flat->fixation->type ?? "";
        $fixationUser = $flat->fixation->user_id ?? 0;
        $userRang = auth()->user()->rang;
        $userId = auth()->user()->id;
        $listResult = [];

        if ($userRang === "Администратор") {
            if ($fixationType === "") {
                $listResult[] = 'Бронировать';
                $listResult[] = 'Продать';
                $listResult[] = 'Бронь руководителя';
            } elseif ($fixationType === "Забронирована") {
                $listResult[] = 'Редактировать бронь';
                $listResult[] = 'Снять бронь';
                $listResult[] = 'Продать';
            } elseif ($fixationType === "Продана") {
                $listResult[] = 'Отменить продажу';
            }elseif ($fixationType === "Бронь руководителя") {
                $listResult[] = 'Снять бронь руководителя';
            }
        } else {
            if ($fixationType === "") {
                $listResult[] = 'Бронировать';
                $listResult[] = 'Продать';
            } elseif (($fixationType === "Забронирована") && ($fixationUser == $userId)) {
                $listResult[] = 'Редактировать бронь';
                $listResult[] = 'Снять бронь';
                $listResult[] = 'Продать';
            }
        }

        return $listResult;
    }

}
