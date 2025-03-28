<?php

namespace App\Filters;

class LogFilter extends QueryFilter {

    public function event_name($event_name) {
        if (!empty($event_name)) {
            $this->builder->where("event_name",  $event_name);
        }
    }

    public function user_id($user_id) {
        if (!empty($user_id)) {
            $this->builder->where("user_id",  $user_id);
        }
    }

    public function section_id($section_id) {
        if (!empty($section_id)) {
            $this->builder->where("section_id",  $section_id);
        }
    }

    public function flat_number($flat_number) {
        if (!empty($flat_number)) {
            $this->builder->where("flat_number",  $flat_number);
        }
    }

    // public function event_name($event_name) {
    //     if (!empty($event_name)) {
    //         $mserch = "%".$event_name."%";
    //         $this->builder->where("event_name", "LIKE", $mserch);
    //     }
    // }


    // public function start_data($start_data) {
    //     if (!empty($start_data)) {
    //         $this->builder->where("created_at", ">=",$start_data);
    //     }
    // }

    // public function end_data($end_data) {
    //     if (!empty($end_data)) {
    //         $this->builder->where("created_at", "<=",$end_data);
    //     }
    // }

    // public function state($state) {
    //     if (!empty($state)) {
    //         $this->builder->where("state", "LIKE", $state);
    //     }
    // }

    // public function serch($serch) {
    //     if (!empty($serch)) {
    //         $mserch = "%".$serch."%";

    //         $this->builder->where(function ($query) use ($mserch) {
    //             $query->where("number", "LIKE", $mserch)
    //                 ->orWhere("pass_number",  "LIKE", $mserch)
    //                 ->orWhereHas('truc', function ($query_l) use ($mserch) {

    //                     $query_l->where("email", "LIKE", $mserch)
    //                     ->orWhere("email_dop", "LIKE", $mserch)
    //                     ->orWhere("email_dop2", "LIKE", $mserch);
    //                 });
    //         });
    //     }
    // }

}
