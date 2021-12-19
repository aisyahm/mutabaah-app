<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
          "name" => "Fullstack Web Dev",
          "description" => "Group mentoring Fullstack Web Development di Yaumi",
          "avatar" => 1,
          "invitation_code" => "FWD21"
        ]);
        Group::create([
          "name" => "User Interface",
          "description" => "Group mentoring UIUX Design di Yaumi",
          "avatar" => 2,
          "invitation_code" => "UIUX21"
        ]);
    }
}
