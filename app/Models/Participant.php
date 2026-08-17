<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participant extends Model
{
    protected $fillable = [
        'name',
        'avatar',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}