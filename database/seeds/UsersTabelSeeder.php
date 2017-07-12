<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0 ; $i < 50; $i++){
            DB::table("users")->insert([
                'name' => $faker->lastName(),
                'email' => $faker->freeEmail(),
                'head_img' => $faker->imageUrl(52,52),
                'password' => bcrypt($faker->lastName()),
                'created_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC'),
                'updated_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC')
            ]);
        }
    }
}
