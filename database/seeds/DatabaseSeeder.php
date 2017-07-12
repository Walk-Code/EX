<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTabelSeeder::class);
        $this->call(CommentTabelSeeder::class);
        $this->call(PagesTabelSeeder::class);
    }
}
