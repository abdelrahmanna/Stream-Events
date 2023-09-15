<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
     * @return MorphOne
     */
    public function events(): MorphOne
    {
        return $this->morphOne(Event::class, "eventable");
    }
}
