<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for($i=0; $i<28; $i++){
            DB::table("products")->insert([
                "name"=>$faker->title,
                "image"=>"image.jpg",
                "description"=>$faker->text,
                "categories_id"=>rand(1,6)
            ]);
        }
    }
}
