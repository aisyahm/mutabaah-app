<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserGroup::create([ "user_id" => 1, "group_id" => 1, "is_accept" => true ]);
        UserGroup::create([ "user_id" => 1, "group_id" => 2, "is_accept" => true ]);
        UserGroup::create([ "user_id" => 2, "group_id" => 1, "is_accept" => true ]);
        UserGroup::create([ "user_id" => 2, "group_id" => 2, "is_accept" => true ]);
        UserGroup::create([ "user_id" => 3, "group_id" => 2, "is_accept" => true ]);
        UserGroup::create([ "user_id" => 3, "group_id" => 1, ]);
        UserGroup::create([ "user_id" => 4, "group_id" => 1, "is_accept" => true ]);
        UserGroup::create([ "user_id" => 4, "group_id" => 2, ]);
        UserGroup::create([ "user_id" => 5, "group_id" => 1, "is_accept" => true ]);
        UserGroup::create([ "user_id" => 6, "group_id" => 2, "is_accept" => true ]);

        //USER GRUP UKHTI
        UserGroup::create([ "user_id" => 7, "group_id" => 3, "is_accept" => true ]); //Atik
        UserGroup::create([ "user_id" => 8, "group_id" => 3, "is_accept" => true ]); //Aisyah
    }
}
