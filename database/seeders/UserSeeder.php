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
          "username" => "shidqi",
          "email" => "shidqi@gmail.com",
          "password" => Hash::make("shi"),
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);
        User::create([
          "name" => "Rizki",
          "username" => "rizki",
          "email" => "rizki@gmail.com",
          "password" => Hash::make("riz"),
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);


        User::create([
          "name" => "Wahyu",
          "username" => "wahyu",
          "email" => "wahyu@gmail.com",
          "password" => Hash::make("why"),
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
        User::create([
          "name" => "Yumna",
          "username" => "yumna",
          "email" => "yumna@gmail.com",
          "password" => Hash::make("yum"),
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
    }
}
