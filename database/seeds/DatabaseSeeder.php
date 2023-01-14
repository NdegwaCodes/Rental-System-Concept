<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            SystemRole::class,
            UserTableSeeder::class,
            TenetTableSeeder::class,
            AdminTableSeeder::class,
            AdvisorTableSeeder::class,
            JazzIdTableSeeder::class,
            PostTableSeeder::class,

         
         ]);
    }
}
