<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class MerchSale extends Model
{
    use HasFactory;

    protected $with = ["merch"];
    
    protected $fillable = [
        "merch_id",
        "user_name",
        "amount",
        "created_at",
    ];

    /**
     * Get the merch that owns the sale.
     * 
     * @return BelongsTo
     */
    public function merch(): BelongsTo
    {
        return $this->belongsTo(Merch::class);
    }

    /**
     * Get events for the merch sale.
     * 
     * @return MorphMany
     */
    public function events(): MorphMany
    {
        return $this->morphMany(Event::class, "eventable");
    }
}
