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
          "invitation_code" => "FWD21"
        ]);
        Group::create([
          "name" => "User Interface",
          "invitation_code" => "UIUX21"
        ]);
    }
}
