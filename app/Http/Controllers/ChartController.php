<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupActivity;
use App\Models\UserGroup;

class ChartController extends Controller
{
  public function self($userId, $groupId) {
    $user = User::find($userId);
    $group = Group::find($groupId);
    
    // AMBIL GRUP AKTIVITAS BERDASARKAN GRUP YANG DIPILIH
    $group_activity = GroupActivity::with("submission")->where("group_id", $group->id)->get();
    $activities = [];
    $taskCurent = [];
    $taskPass = [];
    $totalCurent = [];
    $totalPass = [];
    $values = 0;

    // AUTO GENERATE DATE  ||  MISAL DATE NOW = "24-12-2021"
    $dateNow = "24-12-2021";
    $dateStrPass = date('d M Y', strtotime($dateNow . "-13 days"));     // out: "10-12-2021" || expect: "11-12-2021"
    $dateEndPass = date('d M Y', strtotime($dateNow . "-6 days"));      // out: "18-12-2021" || expect: "17-12-2021"
    $dateStrCurent = date('d M Y', strtotime($dateNow . "-6 days"));    // out: "18-12-2021" || expect: "18-12-2021"
    $dateEndCurent = date('d M Y', strtotime($dateNow . "+1 days"));    // out: "25-12-2021" || expect: "24-12-2021"
    $dates = [
      date('d M', strtotime($dateNow . "-13 days")),    // Start Week Before
      date('d M Y', strtotime($dateNow . "-7 days")),   // End Week Before
      date('d M', strtotime($dateNow . "-6 days")),     // Start Week Now
      date('d M Y', strtotime($dateNow))                // End Week Now
    ];

    // AMBIL VALUE BERDASARKAN USER ID YANG SEDANG LOGIN SAJA, DATE SAAT INI, DAN DATE 7 HARI SEBELUMNYA
    foreach ($group_activity as $activity) {
      $activities[] = explode(" ", $activity->activity->name);
      if (count($activity->submission->where("user_id", $user->id)->where("date", ">", $dateStrCurent)
          ->where("date", "<", $dateEndCurent))) {
        $taskCurent[] = $activity->submission->where("user_id", $user->id)->where("date", ">", $dateStrCurent)
        ->where("date", "<", $dateEndCurent);
      }
      if (count($activity->submission->where("user_id", $user->id)->where("date", ">", $dateStrPass)
          ->where("date", "<", $dateEndPass))) {
        $taskPass[] = $activity->submission->where("user_id", $user->id)->where("date", ">", $dateStrPass)
        ->where("date", "<", $dateEndPass);
      }
    }

    // JUMLAHKAN VALUE IS DONE TIAP ACTIVITY
    foreach ($taskCurent as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
      }
      $totalCurent[] = $values;
      $values = 0;
    }
    foreach ($taskPass as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
      }
      $totalPass[] = $values;
      $values = 0;
    }

    return view("user.analysis-member", [
      "group" => $group,
      "user" => $user,
      "activities" => $activities,
      "totalCurent" => $totalCurent,
      "totalPass" => $totalPass,
      "dates" => $dates
    ]);
  }

  public function overall(Group $group) {
    // AMBIL GRUP AKTIVITAS BERDASARKAN GRUP YANG DIPILIH
    $group_activity = GroupActivity::with("submission")->where("group_id", $group->id)->get();
    $totalMember = count($group->userGroup->where("is_accept", true)) - 1;
    $userGroup = UserGroup::with("user")->where("group_id", $group->id)->where("is_accept", true)->get();
    $activities = [];
    $taskCurent = [];
    $taskPass = [];
    $averageCurent = [];
    $averagePass = [];
    $values = 0;
    $scoreMember = [];

    foreach ($userGroup as $user) {
      if ($user->user->is_mentor == false) $scoreMember[$user->user->name] = 0;
    }

    // AUTO GENERATE DATE  ||  MISAL DATE NOW = "24-12-2021"
    $dateNow = "24-12-2021";
    $dateStrPass = date('d M Y', strtotime($dateNow . "-13 days"));     // out: "10-12-2021" || expect: "11-12-2021"
    $dateEndPass = date('d M Y', strtotime($dateNow . "-6 days"));      // out: "18-12-2021" || expect: "17-12-2021"
    $dateStrCurent = date('d M Y', strtotime($dateNow . "-6 days"));    // out: "18-12-2021" || expect: "18-12-2021"
    $dateEndCurent = date('d M Y', strtotime($dateNow . "+1 days"));    // out: "25-12-2021" || expect: "24-12-2021"
    $dates = [
      date('d M', strtotime($dateNow . "-13 days")),    // Start Week Before
      date('d M Y', strtotime($dateNow . "-7 days")),   // End Week Before
      date('d M', strtotime($dateNow . "-6 days")),     // Start Week Now
      date('d M Y', strtotime($dateNow))                // End Week Now
    ];

    // AMBIL VALUE BERDASARKAN DATE SAAT INI DAN DATE 7 HARI SEBELUMNYA
    foreach ($group_activity as $activity) {
      $activities[] = explode(" ", $activity->activity->name);
      if (count($activity->submission->where("date", ">", $dateStrCurent)->where("date", "<", $dateEndCurent))) {
        $taskCurent[] = $activity->submission->where("date", ">", $dateStrCurent)->where("date", "<", $dateEndCurent);
      }
      if (count($activity->submission->where("date", ">", $dateStrPass)->where("date", "<", $dateEndPass))) {
        $taskPass[] = $activity->submission->where("date", ">", $dateStrPass)->where("date", "<", $dateEndPass);
      }
    }

    // JUMLAHKAN VALUE IS DONE TIAP ACTIVITY (RATA-RATA)  ||  JUMLAHKAN VALUE BERDASARKAN NAMA USER (RANGKING)
    foreach ($taskCurent as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
        $scoreMember[$task->user->name] += $task->is_done;
      }
      $averageCurent[] = round($values / $totalMember, 1);
      $values = 0;
    }
    foreach ($taskPass as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
      }
      $averagePass[] = round($values / $totalMember, 1);
      $values = 0;
    }

    // URUTKAN ARRAY BERDASARKAN VALUE TERBESAR, FILTER UNIQUE VALUE, AMBIL PERINGKAT 3 BESAR
    arsort($scoreMember);   
    $rangking = array_unique($scoreMember);
    $key = array_keys($rangking);
    $topRated = [$rangking[$key[0]], $rangking[$key[1]], $rangking[$key[2]]];

    return view("mentor.analysis-group", [
      "group" => $group,
      "activities" => $activities,
      "averageCurent" => $averageCurent,
      "averagePass" => $averagePass,
      "dates" => $dates,
      "rangking" => $scoreMember,
      "topRated" => $topRated,
      "totalActivity" => count($group_activity)
    ]);
  }
}
