<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogController extends Controller
{
    public function index(Request $request) {
        Gate::authorize('read_log');
        return view('log');
    }
}
