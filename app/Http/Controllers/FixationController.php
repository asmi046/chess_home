<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;
use App\Services\LogServices;
use App\Services\FixationServices;

class FixationController extends Controller
{
    public function get_action_list($flat_id, FixationServices $fix_services) {
        $falt = Flat::where('id', $flat_id)->firstOrFail();
        return $fix_services->get_action_list_by_flat($falt);
    }

    public function do_fixation(Request $request, LogServices $ls) {
        $action = $request->input('action');
        $flat_id = $request->input('flat_id');
        $flat = Flat::where('id', $flat_id)->firstOrFail();

        $adding_data = [
            'user_id' => $request->input('user_id') ?? $flat->fixation->user_id ?? auth()->user()->id,
            'flat_id' => $flat_id,
            'client_name' => $request->input('client_name'),
            'client_phone' => $request->input('client_phone'),
            'comment' => $request->input('comment'),
            'ddu' => $request->input('ddu'),
            'no_pay' => $request->input('no_pay'),
            'no_pact' => $request->input('no_pact'),
            'price' => $request->input('price'),
        ];

        if ($action === "Бронь руководителя") $adding_data['type'] = "Бронь руководителя";
        if ($action === "Бронировать") $adding_data['type'] = "Забронирована";
        if ($action === "Продать") $adding_data['type'] = "Продана";

        $returned = [];
        if ((($action === "Продать") || ($action === "Редактировать бронь")) && $flat->fixation)
            $returned = $flat->fixation()->update($adding_data);
        else
            $returned = $flat->fixation()->create($adding_data);


        $flat->fixation = $flat->fixation()->first();
        $ls->write(action:$action, ip:$request->ip(), flat:$flat);

        return $returned;
    }

    public function clear_fixation(Request $request, LogServices $ls) {
        $action = $request->input('action');
        $flat_id = $request->input('flat_id');
        $flat = Flat::where('id', $flat_id)->firstOrFail();
        $ls->write(action:$action, ip:$request->ip(), flat:$flat);
        $flat->fixation()->delete();
    }
}
