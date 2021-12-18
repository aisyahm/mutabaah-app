<?php

namespace Database\Seeders;

use App\Models\GroupActivity;
use Illuminate\Database\Seeder;

class GroupActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupActivity::create([
          "group_id" => 1,
          "activity_id" => 1
        ]);
        GroupActivity::create([
          "group_id" => 1,
          "activity_id" => 2
        ]);
        GroupActivity::create([
          "group_id" => 2,
          "activity_id" => 3
        ]);
        GroupActivity::create([
          "group_id" => 2,
          "activity_id" => 4
        ]);
    }
}
