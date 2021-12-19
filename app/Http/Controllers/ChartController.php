<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupActivity;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
  public function index(Group $group) {
    // AMBIL GRUP AKTIVITAS BERDASARKAN GRUP YANG DIPILIH
    $group_activity = GroupActivity::where("group_id", $group->id)->get();
    $Groupactivities = [];
    $activities = [];
    $submissions = [];
    $values = 0;
    $average = [];

    foreach ($group_activity as $activity) {
      $Groupactivities[] = $activity->activity->name;
      $submissions[] = $activity->submission;
    }

    // AMBIL VALUE BERDASARKAN USER ID YANG SEDANG LOGIN SAJA
    foreach ($submissions as $submission) {
      for ($i=0; $i < count($submission); $i++) { 
        if ($submission[$i]->user_id == Auth::user()->id) {
          $values += $submission[$i]->is_done;
        }
      }
      $average[] = $values;
      $values = 0;
    }

    // UBAH NAMA AKTIVITAS MENJADI ARRAY VALUE UNTUK ESTETIKA CHART
    foreach ($Groupactivities as $activity) {
      $activities[] = explode(" ", $activity);
    }

    return view("member.analysis", [
      "activities" => $activities,
      "group" => $group,
      "average" => $average
    ]);
  }
}
