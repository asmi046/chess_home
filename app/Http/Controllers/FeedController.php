<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Response;

class FeedController extends Controller
{
    public function index(?int $sectionId = null): Response
    {
        $query = Flat::query()
            ->whereNotNull('ower_flat_type')
            ->whereHas('owerFlatInformation')
            ->whereDoesntHave('fixation');

        if (! is_null($sectionId)) {
            $query->where('section_id', $sectionId);
        }

        $flats = $query->get();

        return response()
            ->view('feed.yrl', ['flats' => $flats])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
