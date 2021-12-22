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
          "email" => "shidqi@gmail.com",
          "password" => Hash::make("shi"),
          "gender" => "Akhi",
          "is_mentor" => false
        ]);
        User::create([
          "name" => "Rizki",
          "email" => "rizki@gmail.com",
          "password" => Hash::make("riz"),
          "gender" => "Akhi",
          "is_mentor" => false
        ]);
        User::create([
          "name" => "Nanda",
          "email" => "nanda@gmail.com",
          "password" => Hash::make("nan"),
          "gender" => "Akhi",
          "is_mentor" => false
        ]);
        User::create([
          "name" => "Ell",
          "email" => "ell@gmail.com",
          "password" => Hash::make("ell"),
          "gender" => "Akhi",
          "is_mentor" => false
        ]);


        User::create([
          "name" => "Wahyu",
          "email" => "wahyu@gmail.com",
          "password" => Hash::make("why"),
          "gender" => "Akhi",
          "is_mentor" => true
        ]);
        User::create([
          "name" => "Yumna",
          "email" => "yumna@gmail.com",
          "password" => Hash::make("yum"),
          "gender" => "Akhi",
          "is_mentor" => true
        ]);
    }
}
