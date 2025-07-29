<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    /** @use HasFactory<\Database\Factories\BikeFactory> */
    use HasFactory;

    /**
     * Get the owner of the Bike (user)
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the components of the bike
     */
    public function components(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Component::class);
    }
}
