<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<28; $i++){
            DB::table("prices")->insert([
                "price"=>rand(200,900),
                "products_id"=>rand(1,28)
            ]);
        }
    }
}
