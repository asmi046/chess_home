<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Services\ChessServices;

class ChessController extends Controller
{
    public function get_chess_data_by_section(string $section_id, ChessServices $cs) {
        $section = Section::with('flats')->where('id', $section_id)->first();
        if (!$section) abort(419, "Секция не найдена");
        return $cs->sort_flats_in_chess($section->flats);
    }

    public function stat(Request $request) {
        $flats = Flat::all();
        $stat = [
            'Свободна' => 0,
            'Забронирована' => 0,
            'Продана' => 0,
            'Бронь руководителя' => 0
        ];

        foreach ($flats as $item) {
            if ($item->fixation)
            {
                $stat[$item->fixation->type] += 1;
            }  else {
                $stat["Свободна"] +=  1;
            }
        }

        return view('stat', ['stat' => $stat]);
    }
}
