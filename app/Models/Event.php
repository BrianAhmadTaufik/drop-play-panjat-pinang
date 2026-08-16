<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'name',
        'target_amount',
        'start_at',
        'end_at',
        'is_active',
        'is_finished',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'is_active' => 'boolean',
        'is_finished' => 'boolean',
    ];

    public function rewards(): HasMany
    {
        return $this->hasMany(Reward::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}