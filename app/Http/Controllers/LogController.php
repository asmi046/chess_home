<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Filters\LogFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogController extends Controller
{
    public function index(LogFilter $request) {
        Gate::authorize('read_log');

        $all = Log::all();
        $filter_data = [];

        foreach ($all as $item) {
            if (empty($item->event_name) ) continue;

            $filter_data['events'][$item->event_name] = 1;
            $filter_data['users'][$item->user_name] = $item->user_id;
            $filter_data['sections'][$item->section_name] = $item->section_id;
        }

        $log = Log::filter($request)
            ->paginate(15)
            ->withQueryString();

        return view('log', ['log' => $log, 'filter' => $filter_data]);
    }
}
