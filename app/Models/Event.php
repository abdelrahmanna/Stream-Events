<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "eventable",
        "isRead",
    ];

    /**
     * Get all of the owning eventable models.
     * 
     * @return MorphTo
     */
    public function eventable(): MorphTo
    {
        return $this->morphTo();
    }
}
