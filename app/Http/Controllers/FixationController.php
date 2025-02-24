<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;
use App\Services\FixationServices;

class FixationController extends Controller
{
    public function get_action_list($flat_id, FixationServices $fix_services) {
        $falt = Flat::where('id', $flat_id)->firstOrFail();
        return $fix_services->get_action_list_by_flat($falt);
    }

    public function do_fixation(Request $request) {

    }

    public function clear_fixation(Request $request) {

    }
}
