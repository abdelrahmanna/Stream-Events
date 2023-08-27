<?php

namespace Database\Seeders;

use App\Models\MerchSale;
use Illuminate\Database\Seeder;

class MerchSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchSale::factory()->count(random_int(300, 500))->create();
    }
}
