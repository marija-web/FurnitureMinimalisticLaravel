<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for($i=0; $i<3; $i++){
            DB::table("users")->insert([
                "firstName"=>$faker->name(),
                "lastName"=>$faker->lastName(),
                "email"=>$faker->email(),
                "roles_id"=>2,
                "password"=>md5("sifra123")
            ]);
        }
    }
}
