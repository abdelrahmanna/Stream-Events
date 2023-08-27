<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Merch extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
    ];

    /**
     * Get all of the merch's sales.
     * 
     * @return HadMany
     */
    public function sales(): HasMany
    {
        return $this->hasMany(MerchSale::class);
    }
}
