<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flat extends Model
{
    public $fillable = [
        'state',
        'section_id',
        'floor',
        'number',
        'type',
        'area1',
        'area2',
        'area3',
        'price_per_meter',
        'price_total',
    ];


    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
