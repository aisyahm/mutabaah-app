<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\UserGroup;
use App\Models\Submission;
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
    $group_activity = GroupActivity::with("submission", "activity")->where("group_id", $group->id)->get();
    $activities = [];
    $activityDetail = [];
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
    $diffDayEndWeek = 7 - Carbon::now()->dayOfWeek;
    $today = Carbon::now()->dayOfWeek - 1;
    
    $today = $today < 0 ? 6 : $today;
    
    // LABEL DATE CHART
    $dates = [
      Carbon::parse($strLastWeek)->isoFormat('D MMM'),
      Carbon::parse($endLastWeek)->isoFormat('D MMM Y'),
      Carbon::parse($strCurentWeek)->isoFormat('D MMM'),
      Carbon::parse($endCurentWeek)->isoFormat('D MMM Y'),
    ];
    
    foreach ($group_activity as $activity) {
      $activities[] = explode(" ", $activity->activity->name);

      // AMBIL VALUE BERDASARKAN USER ID YANG SEDANG LOGIN SAJA, DATE SAAT INI, DAN DATE MINGGU INI DAN MINGGU SEBELUMNYA
      if (count($activity->submission->where("user_id", $user->id)->where("date", ">=", $strCurentWeek)
      ->where("date", "<=", $endCurentWeek))) {
        $taskCurent[] = $activity->submission->where("user_id", $user->id)->where("date", ">=", $strCurentWeek)
        ->where("date", "<=", $endCurentWeek);
        
        $activitySubmission = $activity->submission->where("user_id", $user->id)->where("date", ">=", $strCurentWeek)
        ->where("date", "<=", $endCurentWeek);
        foreach ($activitySubmission as $submission) {
            $activityDetail[$activity->activity->category][$activity->activity->name][] = $submission->is_done;
        }
      }

      
      // JIKA SAMA SEKALI BELUM ADA SUBMISSION
      // ISI 0 UNTUK TIDAK MENGERJAKAN, ISI -2 UNTUK BELUM DIISI (SELISIH DENGAN END WEEK)
      else {
        for ($i=0; $i < 7; $i+1) { 
          if ($i == $now->dayOfWeek) {
            $activityDetail[$activity->activity->category][$activity->activity->name][] = 0;
          } else {
            $activityDetail[$activity->activity->category][$activity->activity->name][] = -2;
          }
        }
      }

      // JIKA KURANG DARI 7 (MINGGU INI MASIH BERJALAN), ISI -2 SAMPAI COUNT ARRAY == 7
      if (count($activityDetail[$activity->activity->category][$activity->activity->name]) < 7 &&
          $diffDayEndWeek > 0) {
        for ($i=0; $i < 7 - count($activityDetail[$activity->activity->category][$activity->activity->name]); $i+1) { 
          $activityDetail[$activity->activity->category][$activity->activity->name][] = -2;
        }
      } 
      
      // JIKA HARI TERSEBUT ADALAH END WEEK
      else if ($diffDayEndWeek == 0) {
        for ($j=0; $j < 7 - count($activityDetail[$activity->activity->category][$activity->activity->name]); $j+1) { 
          // BARU MENGISI SUBMISSION DI END WEEK, TAMBAHKAN 0 DI AWAL ARRAY
          if ($submission->date == $now->format('Y-m-d')) {
            array_unshift($activityDetail[$activity->activity->category][$activity->activity->name], 0);
          } 
          // SISIPKAN 0 DI ARRAY
          else {
            $activityDetail[$activity->activity->category][$activity->activity->name][] = 0;
          }
        }
      }
      
      if (count($activity->submission->where("user_id", $user->id)->where("date", ">=", $strLastWeek)
          ->where("date", "<=", $endLastWeek))) {
        $taskPass[] = $activity->submission->where("user_id", $user->id)->where("date", ">=", $strLastWeek)
        ->where("date", "<=", $endLastWeek);
      }
    }

    // URUTKAN BERDASARKAN AKTIVITAS TERBANYAK  ||  ESTETIKA DETAIL AKTIVITAS
    // arsort($activityDetail);

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

    // dd($today);

    return view("user.analysis-member", [
      "group" => $group,
      "user" => $user,
      "activities" => $activities,
      "totalCurent" => $totalCurent,
      "totalPass" => $totalPass,
      "dates" => $dates,
      "activityDetail" => $activityDetail,
      "today" => $today,
    ]);
  }

  // CHART OVERALL GRUP (SEMUA MEMBER DALAM GRUP TERSEBUT)
  public function overall(Group $group) {
    if (!Auth::user()->is_mentor) return back();

    $users = UserGroup::with("user")->where("group_id", $group->id)->get();
    $usersIn = $users->where("is_accept", true);

    // GET MEMBER DALAM GRUP
    $membersIn = [];
    foreach ($usersIn as $user) {
      $user->user->is_mentor == false ? $membersIn[] = $user->user : "";
    }
    
    // AMBIL GRUP AKTIVITAS BERDASARKAN GRUP YANG DIPILIH
    $group_activity = GroupActivity::with("submission.user", "activity")->where("group_id", $group->id)->get();
    $totalMember = count($group->userGroup->where("is_accept", true)) - 1;
    $userGroup = UserGroup::with("user")->where("group_id", $group->id)->where("is_accept", true)->get();
    $activities = [];
    $activityYesterday = [];
    $activityToday = [];
    $activityDetail = [];
    $taskCurent = [];
    $taskPass = [];
    $averageCurent = [];
    $averagePass = [];
    $values = 0;
    $scoreMember = [];
    $topRated = [];

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

    if (!count(GroupActivity::where("group_id", $group->id)->get())) {
      return view("mentor.analysis-group", [
        "group" => $group,
        "activities" => [],
        "rangking" => [],
        "averagePass" => [],
        "averageCurent" => [],
        "activityDetail" => []
      ]);
    }

    if (count($userGroup) == 1) {
      foreach ($group_activity as $activity) {
        $averageCurent[] = 0;
        $averagePass[] = 0;
        $activities[] = explode(" ", $activity->activity->name);
        $activityDetail[$activity->activity->category][$activity->activity->name] = [0, 0];
      }

      return view("mentor.analysis-group", [
        "group" => $group,
        "activities" => $activities,
        "averageCurent" => 0,
        "averagePass" => 0,
        "dates" => $dates,
        "rangking" => [],
        "totalActivity" => count($group_activity),
        "activityDetail" => $activityDetail,
        "membersIn" => $membersIn
      ]);
    }

    foreach ($userGroup as $user) {
      if ($user->user->is_mentor == false) $scoreMember[$user->user->name] = 0;
    }

    foreach ($group_activity as $activity) {
      $activities[] = explode(" ", $activity->activity->name);

      if (count($activity->submission->where("date", ">=", $strCurentWeek)->where("date", "<=", $endCurentWeek))) {
        $taskCurent[] = $activity->submission->where("date", ">=", $strCurentWeek)->where("date", "<=", $endCurentWeek);
        $activityCurrentWeek[] = $activity->submission->where("date", ">=", $strCurentWeek)->where("date", "<=", $endCurentWeek);
      }
      
      if (count($activity->submission->where("date", ">=", $strLastWeek)->where("date", "<=", $endLastWeek))) {
        $taskPass[] = $activity->submission->where("date", ">=", $strLastWeek)->where("date", "<=", $endLastWeek);
        $activityLastWeek[] = $activity->submission->where("date", ">=", $strLastWeek)->where("date", "<=", $endLastWeek);
      } 
    }

    // JUMLAHKAN VALUE IS DONE TIAP ACTIVITY (RATA-RATA)  ||  JUMLAHKAN VALUE BERDASARKAN NAMA USER (RANGKING)
    foreach ($taskPass as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
      }
      $averagePass[] = round($values / $totalMember, 1);
      $values = 0;
    }
    foreach ($taskCurent as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
        $scoreMember[$task->user->name] += $task->is_done;
      }
      $averageCurent[] = round($values / $totalMember, 1);
      $values = 0;
    }

    foreach ($activityLastWeek as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
      }
      $activityDetail[$task->groupActivity->activity->category][$task->groupActivity->activity->name][] = $values;
      $values = 0;
    }
    foreach ($activityCurrentWeek as $submission) {
      foreach ($submission as $task) {
        $values += $task->is_done;
      }
      $activityDetail[$task->groupActivity->activity->category][$task->groupActivity->activity->name][] = $values;
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
      "totalActivity" => count($group_activity),
      "activityDetail" => $activityDetail,
      "membersIn" => $membersIn
    ]);
  }
}
