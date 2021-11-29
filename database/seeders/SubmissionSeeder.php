<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Submission::create([
          "user_id" => 1,
          "activity_id" => 1,
          "value" => 3,
          "date" => "2021-11-30"
        ]);
        Submission::create([
          "user_id" => 1,
          "activity_id" => 2,
          "value" => 2,
          "date" => "2021-11-27"
        ]);


        Submission::create([
          "user_id" => 2,
          "activity_id" => 3,
          "value" => 4,
          "date" => "2021-12-04"
        ]);
        Submission::create([
          "user_id" => 2,
          "activity_id" => 4,
          "value" => 5,
          "date" => "2021-12-07"
        ]);
    }
}
