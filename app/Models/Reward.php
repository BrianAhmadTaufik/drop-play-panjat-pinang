<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reward extends Model
{
    protected $fillable = [
        'event_id',
        'level',
        'name',
        'threshold_amount',
        'sort_order',
    ];

    protected $casts = [
        'level' => 'integer',
        'threshold_amount' => 'integer',
        'sort_order' => 'integer',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}