<?php
namespace App\Services;

use Illuminate\Support\Str;


class ChessServices {

    private function cmp ($a, $b) {
        return ($a->number > $b->number)?-1:1;
    }

    public function sort_flats_in_chess($list) {
        $result = [];

        foreach ($list as $item) {
            $result['Этаж ' . $item->floor][] = $item;
        }



        foreach ($result as $key => $item) {
            usort($item, function ($a, $b) {
                return ($a->number < $b->number)?-1:1;
            } );
            $result[$key] = $item;
        }

        return $result;
    }

}
