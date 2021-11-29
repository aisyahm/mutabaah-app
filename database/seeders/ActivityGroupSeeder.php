<?php

namespace Database\Seeders;

use App\Models\ActivityGroup;
use Illuminate\Database\Seeder;

class ActivityGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityGroup::create([
          "group_id" => 1,
          "activity_id" => 1
        ]);
        ActivityGroup::create([
          "group_id" => 1,
          "activity_id" => 2
        ]);
        ActivityGroup::create([
          "group_id" => 2,
          "activity_id" => 3
        ]);
        ActivityGroup::create([
          "group_id" => 2,
          "activity_id" => 4
        ]);
    }
}
