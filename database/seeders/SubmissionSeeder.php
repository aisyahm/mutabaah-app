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

    //hari 1 =======
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => "11-12-2021",
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => false,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => "11-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => "11-12-2021",
    ]);

    // hari 2 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => false,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => "12-12-2021",
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => false,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => "12-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => "12-12-2021",
    ]);

    // hari 3 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => false,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => false,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => false,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => "13-12-2021",
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => false,
      "date" => "13-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => "13-12-2021",
    ]);


    // hari 4 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => false,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => "14-12-2021",
    ]);


    // hari 5 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => false,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => false,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => true,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => "15-12-2021",
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => true,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => "15-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => false,
      "date" => "15-12-2021",
    ]);


    // hari 6 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => false,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => false,
      "date" => "16-12-2021",
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => true,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => true,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => true,
      "date" => "16-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => true,
      "date" => "16-12-2021",
    ]);


    // hari 7 ===========
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 1,
      "is_done" => true,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 2,
      "is_done" => true,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 3,
      "is_done" => true,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 4,
      "is_done" => true,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 1,
      "group_activity_id" => 5,
      "is_done" => true,
      "date" => "17-12-2021",
    ]);

    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 6,
      "is_done" => false,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 7,
      "is_done" => false,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 8,
      "is_done" => false,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 9,
      "is_done" => false,
      "date" => "17-12-2021",
    ]);
    Submission::create([
      "user_id" => 2,
      "group_activity_id" => 10,
      "is_done" => false,
      "date" => "17-12-2021",
    ]);

    // HARI 8
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => "18-12-2021,"]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => "18-12-2021,"]);


    // HARI 9
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => "19-12-2021,"]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => "19-12-2021,"]);


    // HARI 10
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => "20-12-2021,"]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => "20-12-2021,"]);


    // HARI 11
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => "21-12-2021,"]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => false, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => false, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => "21-12-2021,"]);


    // HARI 12
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => false, "date" => "22-12-2021,"]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => true, "date" => "22-12-2021,"]);


    // HARI 13
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => false, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => "23-12-2021,"]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => false, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => "23-12-2021,"]);


    // HARI 14
    Submission::create([ "user_id" => 1, "group_activity_id" => 1, "is_done" => false, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 2, "is_done" => false, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 3, "is_done" => false, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 4, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 5, "is_done" => true, "date" => "24-12-2021,"]);

    Submission::create([ "user_id" => 2, "group_activity_id" => 6, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 7, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 8, "is_done" => false, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 9, "is_done" => false, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 10, "is_done" => false, "date" => "24-12-2021,"]);


    // ============================== Shidqi 2 - Rizki 1 ======================================
    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "11-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "11-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "11-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "12-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => "12-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "12-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => "13-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "13-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "13-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "14-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => "14-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "14-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "15-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => "15-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "15-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "16-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "16-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "16-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => "17-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "17-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "17-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => "18-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => "18-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "18-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "19-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => false, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "19-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "19-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => true, "date" => "20-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => false, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "20-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "20-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "21-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => "21-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "21-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => false, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => false, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => false, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "22-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => true, "date" => "22-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "22-12-2021,"]);


    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => false, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "23-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "23-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "23-12-2021,"]);

    
    // HARI 1
    Submission::create([ "user_id" => 2, "group_activity_id" => 1, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 2, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 3, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 4, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 2, "group_activity_id" => 5, "is_done" => false, "date" => "24-12-2021,"]);

    Submission::create([ "user_id" => 1, "group_activity_id" => 6, "is_done" => false, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 7, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 8, "is_done" => true, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 9, "is_done" => false, "date" => "24-12-2021,"]);
    Submission::create([ "user_id" => 1, "group_activity_id" => 10, "is_done" => true, "date" => "24-12-2021,"]);
  }
}
