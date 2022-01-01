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

    // 30 HARI
    // AWAL 1 DESEMBER
    // Submission::create(["user_id" => 7, "group_activity_id" => 1, "is_done" => true, "is_haid" => false,"date" => date('Y-m-d', strtotime($dateNow . "-29 days")),]);
    // Submission::create([
    //   "user_id" => 8,
    //   "group_activity_id" => 1,
    //   "is_done" => false,
    //   "is_haid" => true,
    //   "date" => date('Y-m-d', strtotime($dateNow . "-29 days")),
    // ]);


    // Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);

    // AKHIT DESEMBER
    // Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date($dateNow), ]);

    //hari 1 =======
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);

    // hari 2 ===========
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);

    // hari 3 ===========
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);

    // hari 4 ===========
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);

    // hari 5 ===========
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);

    // hari 6 ===========
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);

    // hari 7 ===========
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);

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

    // ATIK - ID_USER : 7
    // 10 HARI KEDUA
    // Hari 1
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    // Hari 2
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    // Hari 3
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    // Hari 4
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    // Hari 5
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    // Hari 6
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    // Hari 7
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    // Hari 8
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    // Hari 9
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    // Hari 10
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    
    // 10 HARI KEDUA
    // Hari 11
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    // Hari 12
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    // Hari 13
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    // Hari 14
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    // Hari 15
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    // Hari 16
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    // Hari 17
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    // Hari 18
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    // Hari 19
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    // Hari 20
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
  
    // 10 HARI KETIGA
    // Hari 21
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    // Hari 22
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    // Hari 23
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    // Hari 24 - haid
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    // Hari 25 - haid
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    // Hari 26 - haid
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    // Hari 27 - haid
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    // Hari 28 - haid
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    // Hari 29 - haid
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    // Hari 30 - haid
    Submission::create([ "user_id" => 7, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 7, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);



    // AISYAH - ID_USER : 8
    // 10 HARI PERTAMA
    // Hari 1
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-29 days")), ]);
    // Hari 2
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-28 days")), ]);
    // Hari 3
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-27 days")), ]);
    // Hari 4 - haid
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-26 days")), ]);
    // Hari 5 - haid
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-25 days")), ]);
    // Hari 6 - haid
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-24 days")), ]);
    // Hari 7 - haid
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-23 days")), ]);
    // Hari 8 - haid
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-22 days")), ]);
    // Hari 9 - haid
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-21 days")), ]);
    // Hari 10 - haid
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => true, "date" => date('Y-m-d', strtotime($dateNow . "-20 days")), ]);

    // 10 HARI KEDUA
    // Hari 11
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-19 days")), ]);
    // Hari 12
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-18 days")), ]);
    // Hari 13
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-17 days")), ]);
    // Hari 14
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-16 days")), ]);
    // Hari 15
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-15 days")), ]);
    // Hari 16
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-14 days")), ]);
    // Hari 17
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-13 days")), ]);
    // Hari 18
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-12 days")), ]);
    // Hari 19
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-11 days")), ]);
    // Hari 20
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-10 days")), ]);

    // 10 HARI KETIGA
    // Hari 21
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-9 days")), ]);
    // Hari 22
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-8 days")), ]);
    // Hari 23
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-7 days")), ]);
    // Hari 24
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-6 days")), ]);
    // Hari 25
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-5 days")), ]);
    // Hari 26
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-4 days")), ]);
    // Hari 27
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-3 days")), ]);
    // Hari 28
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-2 days")), ]);
    // Hari 29
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-1 days")), ]);
    // Hari 30
    Submission::create([ "user_id" => 8, "group_activity_id" => 11, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 12, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 13, "is_done" => false, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 14, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    Submission::create([ "user_id" => 8, "group_activity_id" => 15, "is_done" => true, "is_haid" => false, "date" => date('Y-m-d', strtotime($dateNow . "-0 days")), ]);
    
  }
}
