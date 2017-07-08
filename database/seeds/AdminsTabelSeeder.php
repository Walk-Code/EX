<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0 ; $i < 3; $i++){
            DB::table("admins")->insert([
                'username' => $faker->lastName(),
                'email' => $faker->freeEmail(),
                'uuid' => sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)),
                'head_img' => $faker->imageUrl(52,52),
                'password' => bcrypt(123456),
                'created_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC'),
                'updated_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC')
            ]);

        }
    }
}
