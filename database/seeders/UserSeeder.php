<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
          "password" => "shi",
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);
        User::create([
          "name" => "Rizki",
          "username" => "rizki",
          "password" => "riz",
          "gender" => "Laki-laki",
          "is_mentor" => false
        ]);


        User::create([
          "name" => "Wahyu",
          "username" => "wahyu",
          "password" => "why",
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
        User::create([
          "name" => "Yumna",
          "username" => "yumna",
          "password" => "yum",
          "gender" => "Laki-laki",
          "is_mentor" => true
        ]);
    }
}
