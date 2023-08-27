<?php

namespace Database\Seeders;

use App\Models\Merch;
use Illuminate\Database\Seeder;

class MerchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merch::factory()->count(30)->create();
    }
}
