<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Subscriber;

class SubscriberObserver
{
    /**
     * Handle the Subscriber "created" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function created(Subscriber $subscriber)
    {
        // get model's morph type from actual class name
        $type = Subscriber::getActualClassNameForMorph(Subscriber::class);
        
        // create Event
        Event::create(
            [
                "eventable_id" => $subscriber->id,
                "eventable_type" => $type,
                "created_at" => $subscriber->created_at,
            ]
        );
    }

    /**
     * Handle the Subscriber "updated" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function updated(Subscriber $subscriber)
    {
        //
    }

    /**
     * Handle the Subscriber "deleted" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function deleted(Subscriber $subscriber)
    {
        //
    }

    /**
     * Handle the Subscriber "restored" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function restored(Subscriber $subscriber)
    {
        //
    }

    /**
     * Handle the Subscriber "force deleted" event.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return void
     */
    public function forceDeleted(Subscriber $subscriber)
    {
        //
    }
}
