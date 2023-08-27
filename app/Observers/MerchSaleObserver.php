<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\MerchSale;

class MerchSaleObserver
{
    /**
     * Handle the MerchSale "created" event.
     *
     * @param  \App\Models\MerchSale  $merchSale
     * @return void
     */
    public function created(MerchSale $merchSale)
    {
        // get model's morph type from actual class name
        $type = MerchSale::getActualClassNameForMorph(MerchSale::class);

        // create Event
        Event::create(
            [
                "eventable_id" => $merchSale->id,
                "eventable_type" => $type,
                "created_at" => $merchSale->created_at,
            ]
        );
    }

    /**
     * Handle the MerchSale "updated" event.
     *
     * @param  \App\Models\MerchSale  $merchSale
     * @return void
     */
    public function updated(MerchSale $merchSale)
    {
        //
    }

    /**
     * Handle the MerchSale "deleted" event.
     *
     * @param  \App\Models\MerchSale  $merchSale
     * @return void
     */
    public function deleted(MerchSale $merchSale)
    {
        //
    }

    /**
     * Handle the MerchSale "restored" event.
     *
     * @param  \App\Models\MerchSale  $merchSale
     * @return void
     */
    public function restored(MerchSale $merchSale)
    {
        //
    }

    /**
     * Handle the MerchSale "force deleted" event.
     *
     * @param  \App\Models\MerchSale  $merchSale
     * @return void
     */
    public function forceDeleted(MerchSale $merchSale)
    {
        //
    }
}
