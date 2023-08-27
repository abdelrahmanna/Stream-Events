<?php

namespace App\Providers;

use App\Models\Donation;
use App\Models\Follower;
use App\Models\MerchSale;
use App\Models\Subscriber;
use App\Observers\DonationObserver;
use App\Observers\FollowerObserver;
use App\Observers\MerchSaleObserver;
use App\Observers\SubscriberObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // bind all observers to their models
        Donation::observe(DonationObserver::class);
        MerchSale::observe(MerchSaleObserver::class);
        Subscriber::observe(SubscriberObserver::class);
        Follower::observe(FollowerObserver::class);
    }
}
