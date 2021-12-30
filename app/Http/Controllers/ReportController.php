<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupActivity;
use App\Models\User;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function member($user, $group) {
      // COLUMN EXCEL: NAMA AKTIVITAS, HAID
      // ROW EXCEL: DATE, IS_DONE, HAID

      $strMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
      $endMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
      $user = User::find($user);
      $group = Group::find($group);

      $activityUser = GroupActivity::with("submission", "activity")->where("group_id", $group->id)->get();
      foreach ($activityUser as $activities) {
        $activitiesSub = $activities->submission->where("user_id", $user->id)->where("date", ">=", $strMonth)->where("date", "<=", $endMonth);
        $activitiesName[] = $activities->activity->name;
        $value = [];
        $userDate = [];
        $userHaid = [];
        
        foreach ($activitiesSub as $activity) {
          $true = "\u{02713}";
          $false = "\u{000D7}";
          $date[] = $activity->date;
          $value[] = $activity->is_done ? json_decode('"'.$true.'"') : json_decode('"'.$false.'"');

          if (count($userHaid) <= count($activitiesSub)) {
            $userHaid[] = $activity->is_haid ? json_decode('"'.$true.'"') : json_decode('"'.$false.'"');
            $userDate[] = $activity->date;
          }
        }
        $userPoint[] = $value;
      }

      $activitiesName = ["Date", ...$activitiesName];

      $activitiesName;                                // TABLE HEAD NAME ACTIVITY
      $query = [$userDate, $userPoint, $userHaid];    // DATA VALUE TABLE

      dump($activitiesName);
      dd($query);
    }

    public function group(Group $group) {
      // COLUMN EXCEL: NAMA MEMBER
      // ROW EXCEL: NAMA AKTIVITAS, TOTAL IS_DONE + TOTAL HAID (DI PALING AKHIR), 
      $strMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
      $endMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
      $activityUser = GroupActivity::with("submission", "activity", "group")->where("group_id", $group->id)->get();
      $userBefore = $activityUser->first()->submission->where("date", ">=", $strMonth)->where("date", "<=", $endMonth)->first()->user->id;
      $memberName = [];
      $userHaid = [];
      $value = 0;
      $haid = 0;
      $i = 1;

      foreach ($activityUser as $activities) {
        $activitiesSub = $activities->submission->where("date", ">=", $strMonth)->where("date", "<=", $endMonth);
        $memberGroup = $activities->group->userGroup->where("is_accept", true);
        $activitiesName[] = $activities->activity->name;

        if (!count($memberName)) {
          foreach ($memberGroup as $member) {
            if (!$member->user->is_mentor) $memberName[] = $member->user->name;
          }
        }
        
        foreach ($activitiesSub as $activity) {
          $date[] = $activity->date;
          if ($activity->user->id == $userBefore) {
            $value += $activity->is_done;
            $haid += $activity->is_haid;
          }
          else if ($activity->user->id != $userBefore) {
            if (!array_key_exists($userBefore, $userHaid)) {
              $userHaid[$userBefore] = $haid;
              $haid = 0;
            }

            $userPoint[$userBefore][] = $value;
            $value = 0;
            $userBefore = $activity->user->id;
            if ($activity->user->id == $userBefore) {
              $value += $activity->is_done;
              $haid += $activity->is_haid;

              if (++$i == count($activitiesSub)) {
                $userPoint[$userBefore][] = $value;
              }
            }
          }
        }
      }
      $userPoint[$userBefore][] = $value;

      if (count($memberName) != count($userPoint)) {
        for ($i=count($userPoint); $i < count($memberName); $i++) {
          $key = mt_rand(0, 10000); 

          for ($j=0; $j <= count($userPoint[$userBefore]); $j++) { 
            $userPoint[$key][] = 0;
          }
        }
      }

      foreach ($userHaid as $key => $haid) {
        $userPoint[$key][] = $haid;
      }

      $memberName = ["Aktivitas", ...$memberName];

      // $memberName;                                                   // TABLE HEAD NAME MEMBER
      $query = [[...$activitiesName, "Total Haid"], $userPoint];     // DATA VALUE TABLE

      dump($memberName);
      dd($query);
    }
}
