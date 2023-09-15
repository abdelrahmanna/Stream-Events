<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
     * @return MorphOne
     */
    public function events(): MorphOne
    {
        return $this->morphOne(Event::class, "eventable");
    }
}
