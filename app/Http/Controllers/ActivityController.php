<?php

namespace App\Http\Controllers;

use \App\Models\User;
use App\Models\Group;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\GroupActivity;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ActivityController extends Controller
{
  // TAMBAH TARGET AKTIVITAS GRUP
  public function add(Group $group){
    if (!Auth::user()->is_mentor) return back();

    $activitiesTemplate = Activity::all();
    $activities = [];

    // AMBIL NAMA & ID AKTIVITAS, SIMPAN DALAM ARRAY ASSOSIATIF
    foreach ($activitiesTemplate as $activity){
      if(!isset($activities[$activity->category])) {
        $activities[$activity->category] = array();
      }
      $activities[$activity->category][] = [$activity->name, $activity->id];
    }

    return view("mentor.add-activities", [
      "activities" => $activities,
      "group" => $group,
    ]);
  }

  // EDIT TARGET AKTIVITAS GRUP
  public function edit(Group $group) {
    $activitiesTemplate = Activity::all();
    $group_activities = GroupActivity::with("activity")->where("group_id", $group->id)->get();
    $activities = [];

    // AMBIL NAMA & ID AKTIVITAS, SIMPAN DALAM ARRAY ASSOSIATIF
    foreach ($activitiesTemplate as $activity){
      if(!isset($activities[$activity->category])) {
        $activities[$activity->category] = array();
      }
      $activities[$activity->category][] = [$activity->name, $activity->id];
    }
    
    // AMBIL ID AKTIVITAS GROUP SEBELUMNYA (UNTUK PENANDA CEKLIS)
    $group_activities_id = [];
    foreach ($group_activities as $activity){
      $group_activities_id[] = $activity->activity->id;
    }

    return view("mentor.edit-activities", [
      "activities" => $activities,
      "group" => $group,
      "group_activities_id" => $group_activities_id
    ]);
  }

  // STORE FORM METHOD POST TARGET AKTIVITAS GRUP
  public function storeAdd(Request $request){
    $group_activities = $request->input('group_activity');
    $group_id = $request->input('group_id');
    $activities_before = GroupActivity::where("group_id", $group_id)->get();

    // EDIT: HAPUS GROUP ACTIVITIES SEBELUMNYA
    if (!is_null($activities_before)) {
      foreach ($activities_before as $activity) {
        $activity->delete();
      }
    }

    // ADD: TAMBAHKAN GROUP ACTIVITIES BARU
    if (!is_null($group_activities)) {
      foreach ($group_activities as $activity){
        GroupActivity::create([
            "group_id" => $group_id,
            "activity_id" => $activity
        ]);
      }
    }

    if (count(GroupActivity::where("group_id", $group_id)->get())) return redirect(route("group-activities", $group_id));

    return redirect(route("group", $group_id));
  }

  // MENTOR: VIEW TARGET AKTIVITAS GRUP
  // MEMBER: SUBMIT TARGET AKTIVITAS GRUP
  public function activities(Group $group){
    $group_activities = GroupActivity::with("activity")->where("group_id", $group->id)->get();

    // GET AKTIVITAS DALAM GRUP TERSEBUT
    $activities = [];
    foreach ($group_activities as $activity){
      if(!isset($activities[$activity->activity->category])) {
        $activities[$activity->activity->category] = array();
      }
      $activities[$activity->activity->category][] = $activity->activity->name;
    }

    // GET WAKTU HARI INI
    $date = Carbon::now()->locale('id')->isoFormat('LLLL');
    $date = explode('pukul',$date)[0];

    if (!Auth::user()->is_mentor) {
      return view("member.submit-submission", [
        "activities" => $activities,
        "group" => $group,
        "date" => $date
      ]);
    }

    return view("mentor.view-activities", [
      "activities" => $activities,
      "group" => $group,
    ]);
  }

}
