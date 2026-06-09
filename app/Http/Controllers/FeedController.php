<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Response;

class FeedController extends Controller
{
    public function index(?int $sectionId = null): Response
    {
        $statuses = config('feed_settings.statuses', []);

        if (is_string($statuses)) {
            $decodedStatuses = json_decode($statuses, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedStatuses)) {
                $statuses = $decodedStatuses;
            } else {
                $statuses = array_map('trim', explode(',', $statuses));
            }
        }

        if (! is_array($statuses)) {
            $statuses = [];
        }

        $statuses = array_values(array_filter($statuses, fn ($status) => is_string($status) && $status !== ''));

        $query = Flat::query()
            ->whereNotNull('ower_flat_type')
            ->whereHas('owerFlatInformation');

        if (empty($statuses)) {
            $query->whereDoesntHave('fixation');
        } else {
            $query->where(function ($subQuery) use ($statuses) {
                $subQuery
                    ->whereDoesntHave('fixation')
                    ->orWhereHas('fixation', function ($fixationQuery) use ($statuses) {
                        $fixationQuery->whereIn('type', $statuses);
                    });
            });
        }

        if (! is_null($sectionId)) {
            $query->where('section_id', $sectionId);
        }

        $flats = $query->get();

        return response()
            ->view('feed.yrl', ['flats' => $flats])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function domClickFeed(?int $sectionId = null): Response
    {
        $statuses = config('feed_settings.statuses', []);

        if (is_string($statuses)) {
            $decodedStatuses = json_decode($statuses, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedStatuses)) {
                $statuses = $decodedStatuses;
            } else {
                $statuses = array_map('trim', explode(',', $statuses));
            }
        }

        if (! is_array($statuses)) {
            $statuses = [];
        }

        $statuses = array_values(array_filter($statuses, fn ($status) => is_string($status) && $status !== ''));

        $query = Flat::query()
            ->whereNotNull('ower_flat_type')
            ->whereHas('owerFlatInformation');

        if (empty($statuses)) {
            $query->whereDoesntHave('fixation');
        } else {
            $query->where(function ($subQuery) use ($statuses) {
                $subQuery
                    ->whereDoesntHave('fixation')
                    ->orWhereHas('fixation', function ($fixationQuery) use ($statuses) {
                        $fixationQuery->whereIn('type', $statuses);
                    });
            });
        }

        if (! is_null($sectionId)) {
            $query->where('section_id', $sectionId);
        }

        $flats = $query->get();

        return response()
            ->view('feed.dom-click', ['flats' => $flats])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
