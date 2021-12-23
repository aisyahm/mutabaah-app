<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\GroupActivity;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class ActivityController extends Controller
{
  // TAMBAH TARGET AKTIVITAS GRUP & EDIT TARGET AKTIVITAS
  public function add(Group $group){
    if (!Auth::user()->is_mentor) return back();

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

    // PERTAMA KALI BUAT AKTIVITAS
    if (!count($group_activities)) {
      return view("mentor.add-activities", [
        "activities" => $activities,
        "group" => $group,
      ]);
    }

    // JIKA SEBELUMNYA MEMILIKI TARGET AKTIVITAS  ||  EDIT TARGET AKTIVITAS,
    // TANDAI AKTIVITAS YANG SUDAH ADA (UNTUK DICENTANG PADA FORM)
    $group_activities_id = [];
    foreach ($group_activities as $activity){
      $group_activities_id[] = $activity->activity->id;
    }

    return view("mentor.add-activities", [
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
    $activitiy_id_before = [];

    foreach ($activities_before as $activity) {
      $activitiy_id_before[] = $activity->activity_id;
    }

    // EDIT: TAMBAHKAN TARGET AKTIVITAS LAINNYA ||  HAPUS TARGET AKTIVITAS YANG TIDAK DICENTANG
    if (!is_null($activities_before)) {
      foreach ($group_activities as $activity) {
        // JIKA AKTIVITAS YANG DICENTANG TIDAK TERDAPAT DALAM AKTIVITAS GRUP, BUAT BARU AKTIVITAS TERSEBUT PADA GRUP
        if (!in_array($activity, $activitiy_id_before)) {
          GroupActivity::create([
            "group_id" => $group_id,
            "activity_id" => $activity
          ]);
        }
      }
      foreach ($activities_before as $activity) {
        // JIKA AKTIVITAS GRUP TIDAK TERDAPAT DALAM AKTIVITAS YANG DICENTANG, HAPUS ROW AKTIVITAS TERSEBUT
        if (!in_array($activity->activity_id, $group_activities)) {
          $activity->delete();
        }
      }
    }

    // ADD: TAMBAHKAN TARGET AKTIVITAS BARU KE GRUP
    // JIKA BELUM ADA AKTIVITAS PADA GRUP, BUAT AKTIVITAS GRUP BERDASARKAN AKTIVITAS YANG DICENTANG
    if (!is_null($group_activities) && !count($activities_before)) {
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
    $group_activities = GroupActivity::with("activity")->orderBy('activity_id')->where("group_id", $group->id)->get();
    $doneBefore = [];
    $submissions = [];
    $activities = [];

    // JADIKAN ASSOSIATIF ARRAY DENGAN KEY: ID_CATEGORY & VALUE: AKTIVITAS & ID_AKTIVITAS
    foreach ($group_activities as $activity){
      if(!isset($activities[$activity->activity->category])) {
        $activities[$activity->activity->category] = array();
      }
      $activities[$activity->activity->category][] = [$activity->activity, $activity->id];

      // MEMBER: CARI SUBMISSION DI HARI TERSEBUT
      if (!Auth::user()->is_mentor) {
        // BUAT BARU SUBMISSION JIKA BELUM MEMILIKI SUBMISSION DI HARI TERSEBUT
        if (!($activity->submission->where("user_id", Auth::user()->id)->where("date", ">=", date('d M Y'))->where("date", "<=", date('d M Y', strtotime(date('d M Y') . "+1 days")))->first())) {
          Submission::create([
            "user_id" => Auth::user()->id,
            "group_activity_id" => $activity->id,
            "date" => date('d-m-Y')
          ]);
        }

        // GET SUBMISSION DI HARI TERSEBUT
        $submissions[] = $activity->load('submission')->submission->where("user_id", Auth::user()->id)
                            ->where("date", ">=", date('d M Y'))
                            ->where("date", "<=", date('d M Y', strtotime(date('d M Y') . "+1 days")))->first();
      }
    }

    // MEMBER: GET DAFTAR SUBMISSION YANG SUDAH DIKERJAKAN SEBELUMNYA (IS_DONE == TRUE) DI HARI TERSEBUT
    if (!Auth::user()->is_mentor) {
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

  // STORE INPUT FORM SUBMISSION
  public function newSubmission(Request $request){
    $group_id = $request->input('group_id');
    $activities_before = GroupActivity::where("group_id", $group_id)->with("submission")->get();
    $activities_check = $request->input('group_activity');
    $haid = $request->input('haid');
    
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

          // UPDATE MENJADI IS_DONE == TRUE UNTUK AKTIVITAS YANG DICEKLIS
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
    
    return redirect(route("chart-member", ["userId" => Auth::user()->id, "groupId" => $group_id]));
  }
}