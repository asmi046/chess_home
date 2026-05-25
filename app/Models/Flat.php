<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Flat extends Model
{
    public $fillable = [
        'section_id',
        'floor',
        'number',
        'type',
        'ower_flat_type',
        'area1',
        'area2',
        'area3',
        'price_per_meter',
        'price_total',
    ];

    protected $with = ['fixation', 'section', 'owerFlatInformation'];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function fixation(): HasOne
    {
        return $this->hasOne(Fixation::class);
    }

    public function owerFlatInformation(): BelongsTo
    {
        return $this->belongsTo(OwerFlatInformation::class, 'ower_flat_type', 'type');
    }
}
