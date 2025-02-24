<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flat extends Model
{
    public $fillable = [
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

    protected $with = ['fixation', 'section'];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function fixation(): HasOne
    {
        return $this->hasOne(Fixation::class);
    }
}
