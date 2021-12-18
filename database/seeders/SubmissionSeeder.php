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
          "group_activity_id" => 1,
          "is_done" => true,
        ]);
        Submission::create([
          "user_id" => 1,
          "group_activity_id" => 2,
          "is_done" => false,
        ]);
        Submission::create([
          "user_id" => 2,
          "group_activity_id" => 3,
          "is_done" => true,
        ]);
        Submission::create([
          "user_id" => 2,
          "group_activity_id" => 4,
          "is_done" => false,
        ]);
    }
}
