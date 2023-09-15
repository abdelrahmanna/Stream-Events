<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Subscriber extends Model
{
    use HasFactory;

    protected $with = ["subscriptionTier"];

    protected $fillable = [
        "name",
        "subscription_tier_id",
        "created_at",
    ];

    /**
     * Get the subscriber's subscription tier.
     * 
     * @return BelongsTo
     */
    public function subscriptionTier(): BelongsTo
    {
        return $this->belongsTo(SubscriptionTier::class);
    }

    /**
     * Get events for the subscriber.
     * 
     * @return MorphOne
     */
    public function events(): MorphOne
    {
        return $this->morphOne(Event::class, "eventable");
    }
}
