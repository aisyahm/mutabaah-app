<?php

namespace Database\Seeders;

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
        UserSeeder::class,
        UserGroupSeeder::class,
        GroupSeeder::class,
        ActivityGroupSeeder::class,
        ActivitySeeder::class,
        SubmissionSeeder::class,
      ]);
    }
}
