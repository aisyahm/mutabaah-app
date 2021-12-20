<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupActivity;

class ChartController extends Controller
{
  public function self($userId, $groupId) {
    $user = User::find($userId);
    $group = Group::find($groupId);
    
    // AMBIL GRUP AKTIVITAS BERDASARKAN GRUP YANG DIPILIH
    $group_activity = GroupActivity::with("submission")->where("group_id", $group->id)->get();
    $Group_activities = [];
    $activities = [];
    $taskCurent = [];
    $taskPass = [];
    $totalCurent = [];
    $totalPass = [];
    $values = 0;

    // AUTO GENERATE DATE  ||  MISAL DATE NOW = "24-12-2021"
    $dateNow = "24-12-2021";
    $dateStrCurent = date('d-m-Y', strtotime($dateNow . "-6 days"));    // out: "18-12-2021" || Date now - 6 day
    $dateEndCurent = date('d-m-Y', strtotime($dateNow . "+1 days"));    // out: "25-12-2021" || Date now + 1 day
    $dateStrPass = date('d-m-Y', strtotime($dateNow . "-14 days"));     // out: "10-12-2021" || Date now - 14 day
    $dateEndPass = date('d-m-Y', strtotime($dateNow . "-6 days"));      // out: "18-12-2021" || Date now - 6 day
    
    // AMBIL VALUE BERDASARKAN USER ID YANG SEDANG LOGIN SAJA, DATE SAAT INI, DAN DATE 7 HARI SEBELUMNYA
    foreach ($group_activity as $activity) {
      $Group_activities[] = $activity->activity->name;
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

    // UBAH NAMA AKTIVITAS MENJADI ARRAY VALUE UNTUK ESTETIKA CHART
    foreach ($Group_activities as $activity) {
      $activities[] = explode(" ", $activity);
    }

    return view("user.analysis-member", [
      "group" => $group,
      "user" => $user,
      "activities" => $activities,
      "totalCurent" => $totalCurent,
      "totalPass" => $totalPass,
    ]);
  }
}
