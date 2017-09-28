<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = \Faker\Factory::create();

        for($i = 0 ; $i < 10000; $i++){
            DB::table("posts")->insert([
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(6,true),
                'tag_id' => mt_rand(1,999),
                'uuid' => $faker->uuid,
                'created_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC'),
                'updated_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC'),
                'times' => time()
            ]);
        }

    }
}
