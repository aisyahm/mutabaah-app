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
          "unit" => "Hour"
        ]);
        Activity::create([
          "name" => "Create Database",
          "unit" => "Hour"
        ]);


        Activity::create([
          "name" => "Learning Figma",
          "unit" => "Hour"
        ]);
        Activity::create([
          "name" => "Design UI",
          "unit" => "Hour"
        ]);
    }
}
