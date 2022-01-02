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
    // TOLONG BUATKAN SEEDER SEBANYAK 10 ROW
    // KETENTUAN: [GROUP_ID (MAX 2) & ACTIVITY_ID (MAX 22)] => (MASING-MASING 5 ROW)
    // SINKRON DENGAN SUBMISSION SEEDER


    // GRUP 1
    GroupActivity::create([ "group_id" => 1, "activity_id" => 3 ]);
    GroupActivity::create([ "group_id" => 1, "activity_id" => 6 ]);
    GroupActivity::create([ "group_id" => 1, "activity_id" => 7 ]);
    GroupActivity::create([ "group_id" => 1, "activity_id" => 14 ]);
    GroupActivity::create([ "group_id" => 1, "activity_id" => 22 ]);

    // GRUP 2
    GroupActivity::create([ "group_id" => 2, "activity_id" => 1 ]);
    GroupActivity::create([ "group_id" => 2, "activity_id" => 8 ]);
    GroupActivity::create([ "group_id" => 2, "activity_id" => 10 ]);
    GroupActivity::create([ "group_id" => 2, "activity_id" => 11 ]);
    GroupActivity::create([ "group_id" => 2, "activity_id" => 19 ]);

    // GRUP 3 - FWD UKHTI
    GroupActivity::create([ "group_id" => 3, "activity_id" => 1 ]);
    GroupActivity::create([ "group_id" => 3, "activity_id" => 2 ]);
    GroupActivity::create([ "group_id" => 3, "activity_id" => 17 ]);
    GroupActivity::create([ "group_id" => 3, "activity_id" => 18 ]);
    GroupActivity::create([ "group_id" => 3, "activity_id" => 19 ]);
  }
}
