<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\UserGroup;
use App\Models\GroupActivity;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChartController extends Controller
{
  // CHART INDIVIDU MEMBER
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

    // AUTO GENERATE DATE  ||  DATE UNTUK FILTER SUBMISSION BY WEEK  ||  DIMULAI SAAT HARI SENIN - MINGGU
    $now = Carbon::now();
    $strLastWeek = $now->startOfWeek()->copy()->subDays(7)->format('Y-m-d');
    $endLastWeek = $now->endOfWeek()->copy()->subDays(7)->format('Y-m-d');
    $strCurentWeek = $now->startOfWeek()->format('Y-m-d');
    $endCurentWeek = $now->endOfWeek()->format('Y-m-d');

    // LABEL DATE CHART
    $dates = [
      Carbon::parse($strLastWeek)->isoFormat('D MMM'),
      Carbon::parse($endLastWeek)->isoFormat('D MMM Y'),
      Carbon::parse($strCurentWeek)->isoFormat('D MMM'),
      Carbon::parse($endCurentWeek)->isoFormat('D MMM Y'),
    ];
    
    // AMBIL VALUE BERDASARKAN USER ID YANG SEDANG LOGIN SAJA, DATE SAAT INI, DAN DATE MINGGU INI DAN MINGGU SEBELUMNYA
    foreach ($group_activity as $activity) {
      $activities[] = explode(" ", $activity->activity->name);

      if (count($activity->submission->where("user_id", $user->id)->where("date", ">=", $strCurentWeek)
          ->where("date", "<=", $endCurentWeek))) {
        $taskCurent[] = $activity->submission->where("user_id", $user->id)->where("date", ">=", $strCurentWeek)
        ->where("date", "<=", $endCurentWeek);
      }
      if (count($activity->submission->where("user_id", $user->id)->where("date", ">=", $strLastWeek)
          ->where("date", "<=", $endLastWeek))) {
        $taskPass[] = $activity->submission->where("user_id", $user->id)->where("date", ">=", $strLastWeek)
        ->where("date", "<=", $endLastWeek);
      }
    }

    // JUMLAHKAN VALUE IS DONE TIAP AKTIVITAS
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

  // CHART OVERALL GRUP (SEMUA MEMBER DALAM GRUP TERSEBUT)
  public function overall(Group $group) {
    if (!Auth::user()->is_mentor) return back();
    
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
    $topRated = [];

    foreach ($userGroup as $user) {
      if ($user->user->is_mentor == false) $scoreMember[$user->user->name] = 0;
    }

    // AUTO GENERATE DATE  ||  DATE UNTUK FILTER SUBMISSION BY WEEK  ||  DIMULAI SAAT HARI SENIN - MINGGU
    $now = Carbon::now();
    $strLastWeek = $now->startOfWeek()->copy()->subDays(7)->format('Y-m-d');
    $endLastWeek = $now->endOfWeek()->copy()->subDays(7)->format('Y-m-d');
    $strCurentWeek = $now->startOfWeek()->format('Y-m-d');
    $endCurentWeek = $now->endOfWeek()->format('Y-m-d');

    // LABEL DATE CHART
    $dates = [
      Carbon::parse($strLastWeek)->isoFormat('D MMM'),
      Carbon::parse($endLastWeek)->isoFormat('D MMM Y'),
      Carbon::parse($strCurentWeek)->isoFormat('D MMM'),
      Carbon::parse($endCurentWeek)->isoFormat('D MMM Y'),
    ];

    foreach ($group_activity as $activity) {
      $activities[] = explode(" ", $activity->activity->name);

      if (count($activity->submission->where("date", ">=", $strCurentWeek)->where("date", "<=", $endCurentWeek))) {
        $taskCurent[] = $activity->submission->where("date", ">=", $strCurentWeek)->where("date", "<=", $endCurentWeek);
      }
      if (count($activity->submission->where("date", ">=", $strLastWeek)->where("date", "<=", $endLastWeek))) {
        $taskPass[] = $activity->submission->where("date", ">=", $strLastWeek)->where("date", "<=", $endLastWeek);
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
    $keys = array_keys($rangking);
    foreach ($keys as $key) {
      $topRated[] = $rangking[$key];
    }

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
