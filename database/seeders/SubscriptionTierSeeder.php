<?php

namespace Database\Seeders;

use App\Models\SubscriptionTier;
use Illuminate\Database\Seeder;

class SubscriptionTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionTier::create([
            "name" => "Tier 1",
            "price" => 5,
        ]);
        
        SubscriptionTier::create([
            "name" => "Tier 2",
            "price" => 10,
        ]);

        SubscriptionTier::create([
            "name" => "Tier 3",
            "price" => 15,
        ]);
        
    }
}
