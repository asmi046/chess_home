<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    public $fillable = [
        'name',
        'number',
        'floor_count',
        'area_total',
        'adress',
        'geo',
    ];


    public function flats(): HasMany
    {
        return $this->hasMany(Flat::class);
    }
}
