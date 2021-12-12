<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
          "name" => "Coding Web",
          "category" => 1
        ]);
        Activity::create([
          "name" => "Create Database",
          "category" => 2
        ]);


        Activity::create([
          "name" => "Learning Figma",
          "category" => 3
        ]);
        Activity::create([
          "name" => "Design UI",
          "category" => 3
        ]);
    }
}
