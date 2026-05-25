<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OwerFlatInformation extends Model
{
    protected $table = 'ower_flat_informations';

    public $fillable = [
        'type',
        'gallery',
        'address',
        'city',
        'country',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    public function flats(): HasMany
    {
        return $this->hasMany(Flat::class, 'ower_flat_type', 'type');
    }
}
