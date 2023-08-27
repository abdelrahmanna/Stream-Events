<?php

namespace App\Observers;

use App\Models\Donation;
use App\Models\Event;

class DonationObserver
{
    /**
     * Handle the Donation "created" event.
     *
     * @param  \App\Models\Donation  $donation
     * @return void
     */
    public function created(Donation $donation)
    {
        // map model's morph type from actual class name
        $type = Donation::getActualClassNameForMorph(Donation::class);
        
        // create Event
        Event::create(
            [
                "eventable_id" => $donation->id,
                "eventable_type" => $type,
                "created_at" => $donation->created_at,
            ]
        );
    }

    /*
     * Handle the Donation "updated" event.
     *
     * @param  \App\Models\Donation  $donation
     * @return void
     */
    public function updated(Donation $donation)
    {
        //
    }

    /**
     * Handle the Donation "deleted" event.
     *
     * @param  \App\Models\Donation  $donation
     * @return void
     */
    public function deleted(Donation $donation)
    {
        //
    }

    /**
     * Handle the Donation "restored" event.
     *
     * @param  \App\Models\Donation  $donation
     * @return void
     */
    public function restored(Donation $donation)
    {
        //
    }

    /**
     * Handle the Donation "force deleted" event.
     *
     * @param  \App\Models\Donation  $donation
     * @return void
     */
    public function forceDeleted(Donation $donation)
    {
        //
    }
}
