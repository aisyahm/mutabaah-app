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
          "password" => Hash::make("shi"),
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);
        User::create([
          "name" => "Rizki",
          "username" => "rizki",
          "password" => Hash::make("riz"),
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);


        User::create([
          "name" => "Wahyu",
          "username" => "wahyu",
          "password" => Hash::make("why"),
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
        User::create([
          "name" => "Yumna",
          "username" => "yumna",
          "password" => Hash::make("yum"),
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
    }
}
