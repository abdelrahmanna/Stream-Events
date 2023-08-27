<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // call all seeders
        $this->call([
            MerchSeeder::class,
            SubscriptionTierSeeder::class,
            SubscriberSeeder::class,
            MerchSaleSeeder::class,
            FollowerSeeder::class,
            DonationSeeder::class,
        ]);
    }
}
