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
        User::create([
          "name" => "Shidqi",
          // ngadi
          "submission_id" => 1,
          "email" => "shidqi@gmail.com",
          "password" => Hash::make("shi"),
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);
        User::create([
          "name" => "Rizki",
           // ngadi
           "submission_id" => 2,
          "email" => "rizki@gmail.com",
          "password" => Hash::make("riz"),
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);


        User::create([
          "name" => "Wahyu",
          "email" => "wahyu@gmail.com",
          "password" => Hash::make("why"),
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
        User::create([
          "name" => "Yumna",
          "email" => "yumna@gmail.com",
          "password" => Hash::make("yum"),
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
    }
}
