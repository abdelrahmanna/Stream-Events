<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "created_at",
    ];

    /**
     * Get all of the follower's events.
     * 
     * @return MorphMany
     */
    public function events(): MorphMany
    {
        return $this->morphMany(Event::class, "eventable");
    }
}
