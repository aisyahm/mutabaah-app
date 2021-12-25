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
    // TOLONG BUATKAN SEEDER SEBANYAK 70 ROW
    // KETENTUAN: USER_ID (MAX 2), IS_DONE (TRUE / FALSE), 
    //            DATE (1 HARI ADA 7 SUBMISSION DIKERJAKAN OLEH 1 USER)
    // SINKRON DENGAN GROUP_ACTIVITY SEEDER

    // CATATAN
    // GRUP 1 (FWD) member: shidqi, aktivitas: 1,4,7,12,20
    // EXAMPLE CODE
    $dateNow = date('Y-m-d');

    //hari 1 =======
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);

    // hari 2 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-13 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-12 days")),
    ]);

    // hari 3 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-11 days")),
    ]);


    // hari 4 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-10 days")),
    ]);


    // hari 5 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-9 days")),
    ]);


    // hari 6 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-8 days")),
    ]);


    // hari 7 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => true,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => false,
      "date" => date('Y-m-d', strtotime($dateNow . "-7 days")),
    ]);

    // HARI 8
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);


    // HARI 9
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);


    // HARI 10
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);


    // HARI 11
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);


    // HARI 12
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);


    // HARI 13
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);


    // HARI 14
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => $dateNow]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => false, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => $dateNow]);


    // ============================== Shidqi 2 - Rizki 1 ======================================
    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days"))]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days"))]);

    
    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => $dateNow]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => $dateNow]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => $dateNow]);
  }
}
