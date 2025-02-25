<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fixation extends Model
{
    public $fillable = [
        'user_id',
        'flat_id',
        'type',
        'client_name',
        'client_phone',
        'comment',
        'ddu',
        'price',
    ];

    public function flat(): BelongsTo
    {
        return $this->belongsTo(Flat::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
