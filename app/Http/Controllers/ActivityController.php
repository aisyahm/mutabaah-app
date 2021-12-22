<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\GroupActivity;
use App\Models\Submission;
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

    $doneBefore = [];
    $submissions = [];
    // GET AKTIVITAS DALAM GRUP TERSEBUT
    $activities = [];
    foreach ($group_activities as $activity){
      if(!isset($activities[$activity->activity->category])) {
        $activities[$activity->activity->category] = array();
      }
      $activities[$activity->activity->category][] = [$activity->activity, $activity->id];

      $submissions[] = $activity->submission->where("user_id", Auth::user()->id)
                          ->where("date", ">=", date('d-m-Y'))
                          ->where("date", "<=", date('d M Y', strtotime(date('d-m-Y') . "+1 days")))->first();
    }

    foreach ($submissions as $submission) {
      if ($submission->user_id == Auth::user()->id
          && $submission->date >= date('d-m-Y')
          && $submission->date <= date('d-m-Y', strtotime(date('d-m-Y') . "+1 days"))
          && $submission->is_done == true) {
          
          $doneBefore[] = $submission->group_activity_id;
      }
    }

    // GET WAKTU HARI INI
    $date = Carbon::now()->isoFormat('dddd, D MMMM Y');

    if (!Auth::user()->is_mentor) {
      return view("member.submit-submission", [
        "activities" => $activities,
        "group" => $group,
        "doneBefore" => $doneBefore,
        "date" => $date
      ]);
    }

    return view("mentor.view-activities", [
      "activities" => $activities,
      "group" => $group,
    ]);
  }

  public function newSubmission(Request $request){
    $group_id = $request->input('group_id');
    $activities_before = GroupActivity::where("group_id", $group_id)->get();
    $activities_check = $request->input('group_activity');
    $haid = $request->input('haid');

    foreach ($activities_before as $activity) {
      // JIKA TIDAK ADA SUBMISSION DI HARI TERSEBUT || PERTAMA KALI MENGISI
      if (!count($activity->submission->where("user_id", Auth::user()->id)
        ->where("group_activity_id", $activity->id)
        ->where("date", ">=", date('d-m-Y'))
        ->where("date", "<=", date('d M Y', strtotime(date('d-m-Y') . "+1 days"))))) {

        Submission::create([
          "user_id" => Auth::user()->id,
          "group_activity_id" => $activity->id,
          "date" => date('d-m-Y')
        ]);

        dd("kalo ini tampil berarti salah");
      } 
    }

    session([
      "group_id" => $group_id,
      "activities_check" => $activities_check,
      "haid" => $haid
    ]);

    return redirect(route("update-submission"));
  }

  public function updateSubmission() {
    $group_id = session("group_id");
    $activities_before = GroupActivity::where("group_id", $group_id)->get();
    $activities_check = session("activities_check");
    $haid = session("haid");
    
    foreach ($activities_before as $activity) {
      // JIKA SEBELUMNYA ADA SUBMISSION DI HARI TERSEBUT || SUDAH PERNAH MENGISI
      if (($activity->submission->where("user_id", Auth::user()->id)
          ->where("group_activity_id", $activity->id)
          ->where("date", ">=", date('d-m-Y'))
          ->where("date", "<=", date('d M Y', strtotime(date('d-m-Y') . "+1 days"))))) {

        // UPDATE MENJADI IS_DONE == FALSE SEMUANYA TERLEBIH DAHULU || RESET DATA IS_DONE
        if ($haid) {
          $activity->submission->where("user_id", Auth::user()->id)
          ->where("group_activity_id", $activity->id)
          ->where("date", ">=", date('d-m-Y'))
          ->where("date", "<=", date('d M Y', strtotime(date('d-m-Y') . "+1 days")))->first()
          ->update([
            "is_done" => false,
            "is_haid" => true
          ]);
        } else {
          $activity->submission
            ->where("user_id", Auth::user()->id)
            ->where("group_activity_id", $activity->id)
            ->where("date", ">=", date('d-m-Y'))
            ->where("date", "<=", date('d M Y', strtotime(date('d-m-Y') . "+1 days")))->first()
            ->update([
              "is_done" => false,
              "is_haid" => false
            ]);
        }

        // // UPDATE MENJADI IS_DONE == TRUE UNTUK AKTIVITAS YANG DICEKLIS
        if (!is_null($activities_check)) {
          if (in_array($activity->activity_id, $activities_check)) {
            $activity->submission
              ->where("user_id", Auth::user()->id)
              ->where("group_activity_id", $activity->id)
              ->where("date", ">=", date('d-m-Y'))
              ->where("date", "<=", date('d M Y', strtotime(date('d-m-Y') . "+1 days")))->first()
              ->update([
                "is_done" => true
              ]);
          }
        }
      }
    }

    return redirect(route("group-activities", $group_id));
    // return back();
  }
}