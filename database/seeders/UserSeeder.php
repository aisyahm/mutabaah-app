<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ "name" => "Shidqi", "email" => "shidqi@gmail.com", "password" => Hash::make("shi"), "no_telp" => 121223344, "description" => "Freshgraduate from PNJ", "gender" => "Akhi", "is_mentor" => false ]);
        User::create([ "name" => "Rizki", "email" => "rizki@gmail.com", "password" => Hash::make("riz"), "no_telp" => 2428394731, "description" => "Member Fullstack Web Dev", "gender" => "Akhi", "is_mentor" => false ]);
        User::create([ "name" => "Nanda", "email" => "nanda@gmail.com", "password" => Hash::make("nan"), "no_telp" => 9472921345, "description" => "Freshgraduate from ITS", "gender" => "Akhi", "is_mentor" => false ]);
        User::create([ "name" => "Ell", "email" => "ell@gmail.com", "password" => Hash::make("ell"), "no_telp" => 749326294, "description" => "Undergraduate from UNHAS", "gender" => "Akhi", "is_mentor" => false ]);
        User::create([ "name" => "Wahyu", "email" => "wahyu@gmail.com", "password" => Hash::make("why"), "no_telp" => 394392045, "description" => "Mentor Fullstack Web Dev", "gender" => "Akhi", "is_mentor" => true ]);
        User::create([ "name" => "Yumna", "email" => "yumna@gmail.com", "password" => Hash::make("yum"), "no_telp" => 7292704720, "description" => "Mentor UIUX Design", "gender" => "Akhi", "is_mentor" => true ]);

        //USER UKHTI
        User::create([ "name" => "Atik", "email" => "atik@gmail.com", "password" => Hash::make("atk"), "no_telp" => 121223355, "description" => "Awardee YDS-FWD UKHTI", "gender" => "Ukhti", "is_mentor" => false ]);
        User::create([ "name" => "Aisyah", "email" => "aisyah@gmail.com", "password" => Hash::make("ais"), "no_telp" => 121333355, "description" => "Awardee YDS-FWD UKHTI", "gender" => "Ukhti", "is_mentor" => false ]);
    }
}
