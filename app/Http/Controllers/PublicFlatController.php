<?php

namespace App\Http\Controllers;

use App\Models\Flat;

class PublicFlatController extends Controller
{
    public function index($id)
    {
        $flat = Flat::select()->findOrFail($id);

        return view('public-flat', [
            'flat' => $flat,
        ]);
    }
}
