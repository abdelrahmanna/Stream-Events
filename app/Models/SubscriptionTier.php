<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionTier extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
    ];

    /**
     * Get all of the tier's subscriptions.
     * 
     * @return HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscriber::class);
    }
}
