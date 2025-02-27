<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $fillable = [
        'event_name',
        'ip',
        'user_name',
        'user_id',
        'user_email',
        'user_phone',
        'section_id',
        'section_name',
        'flat_number',
        'flat_type',
        'flat_price',
        'client_name',
        'client_phone',
        'fixation_comment',
        'fixation_ddu',
        'fixation_price'
    ];

    public function scopeFilter($builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
