<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\GroupActivity;
use App\Models\Submission;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GroupController extends Controller
{
    // STORE INPUT FORM BUAT GRUP BARU
    public function storeCreate(Request $request) {
      $groups = Group::all();

      // CARI APAKAH NAMA GRUP SUDAH ADA  ||  NAMA TIDAK BOLEH SAMA
      foreach ($groups as $group) {
        if ($group->name == $request->name) {
          $request->session()->flash("exist");
          $request->flash("name", $request->name);
          $request->flash("desc", $request->desc);
          return back();
        }
      }
      
      // GENERATE RANDOM CODE UNTUK REFEAL CODE
      $code = Str::random(6);
      while (Group::where("invitation_code", $code)->exists()) {
        $code = Str::random(6);
      }
      
      // MASUKKAN DATA KE TABEL GRUP
      Group::create([
        "name" => $request->name,
        "description" => $request->desc,
        "avatar" => $request->avatar,
        "invitation_code" => $code,
      ]);
      
      // MASUKKAN DATA MENTOR KE TABEL USER_GRUP
      UserGroup::create([
        "user_id" => Auth::user()->id,
        "group_id" => Group::where("name", $request->name)->first()->id,
        "is_accept" => true
      ]);

      return back();
    }

    // STORE DATA EDIT GROUP
    public function edit(Request $request) {
      $group = Group::find($request->group);

      $group->update([
          "name" => $request->name,
          "description" => $request->description,
          "avatar" => $request->avatar,
      ]);

      return back();
    }

    // TERIMA PERMINTAAN MEMBER BERGABUNG DALAM GRUP
    public function accept($group, $user) {
      if (Auth::user()->is_mentor == false) return back();

      // CARI DATA MEMBER DALAM TABEL USER_GRUP, UPDATE IS_ACCEPT = TRUE
      $member = UserGroup::where("user_id", $user)->where("group_id", $group)->first();
      $member->update(["is_accept" => true]);

      $strWeekBefore = Carbon::now()->startOfWeek()->copy()->subDays(7)->format('Y-m-d');
      $diffWeek = Carbon::parse(Carbon::now())->diffInDays($strWeekBefore);
      $strMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
      $diffMonth = Carbon::parse(Carbon::now())->diffInDays($strMonth);

      $groupActivity = GroupActivity::where("group_id", $group)->get();

      foreach ($groupActivity as $activity) {
        for ($j=0; $j <= ($diffWeek < $diffMonth ? $diffMonth : $diffWeek); $j++) { 
          Submission::create([
            "user_id" => $user,
            "group_activity_id" => $activity->id,
            "date" => Carbon::now()->subDays($j)->format('Y-m-d')
          ]);
        }
      }
      
      return back();
    }

    // TOLAK PERMINTAAN MEMBER BERGABUNG DALAM GRUP
    public function reject($group, $user) {
      if (Auth::user()->is_mentor == false) return back();

      // CARI DATA MEMBER DALAM TABEL USER_GRUP, HAPUS ROW TERSEBUT
      $member = UserGroup::where("user_id", $user)->where("group_id", $group)->first();
      $member->delete();
    
      return back();
    }

    // HAPUS GRUP DAN KELUAR GRUP
    public function dangerGroup(Request $request) {
      // JIKA REQUEST HAPUS GRUP  ||  DILAKUKAN OLEH MENTOR
      // HAPUS SEMUA USER DI TABEL USER_GRUP YANG GROUP_ID == GROUP->ID, 
      // HAPUS GRUP DARI TABEL GRUP, HAPUS AKTIVITAS GRUP DI TABEL GROUP_ACTIVITY
      if ($request->delete) {
        $userGroup = UserGroup::where("group_id", $request->group_id);
        $group = Group::find($request->group_id);
        $groupActivity = GroupActivity::where("group_id", $request->group_id);

        $userGroup->delete();
        $group->delete();
        $groupActivity->delete();

        $groupActivity = GroupActivity::where("group_id", $request->group_id)->get();
        foreach ($groupActivity as $activity) {
          Submission::where("group_activity_id", $activity->id)->delete();
        }
      } 

      // JIKA REQUEST KELUAR GRUP  ||  DILAKUKAN OLEH MEMBER
      // HAPUS DATA USER DI TABEL USER_GRUP YANG GROUP_ID == GROUP->ID DAN USER_ID == USER->ID
      else if ($request->leave) {
        $userGroup = UserGroup::where("user_id", Auth::user()->id)->where("group_id", $request->group_id)->get()->first();
        
        $userGroup->delete();
        $groupActivity = GroupActivity::where("group_id", $request->group_id)->get();
        foreach ($groupActivity as $activity) {
          Submission::where("user_id", Auth::user()->id)->where("group_activity_id", $activity->id)->delete();
        }
      }

      // JIKA REQUEST KELUARKAN MEMBER DARI GRUP  ||  DILAKUKAN OLEH MENTOR
      // HAPUS DATA USER DI TABEL USER_GRUP YANG GROUP_ID == GROUP->ID DAN USER_ID == USER->ID
      else if ($request->kick) {
        $user = UserGroup::where("user_id", $request->user_id)->where("group_id", $request->group_id)->first();
        
        $user->delete();
        $groupActivity = GroupActivity::where("group_id", $request->group_id)->get();
        foreach ($groupActivity as $activity) {
          Submission::where("user_id", $request->user_id)->where("group_activity_id", $activity->id)->delete();
        }

        return redirect(route("chart-overall", $request->group_id));
      }
      
      return redirect(route("home"));
    }

    // HALAMAN ANGGOTA
    public function anggota(Group $group) {
      // GET USER DALAM GRUP, SUDAH DITERIMA, ATAU MASIH PENDING (MENUNGGU KONFIRMASI BERGABUNG)
      $users = UserGroup::where("group_id", $group->id)->get();
      $usersOut = $users->where("is_accept", false);
      $usersIn = $users->where("is_accept", true);

      // GET MENTOR DALAM GRUP
      $mentors = [];
      foreach ($usersIn as $mentor) {
        if ($mentor->user->is_mentor) $mentors[] = $mentor->user->name;
      }

      // GET MEMBER DALAM GRUP
      $membersIn = [];
      foreach ($usersIn as $user) {
        $user->user->is_mentor == false ? $membersIn[] = $user->user : "";
      }

      if (!Auth::user()->is_mentor) {
        return view("member.anggota", [
          "mentors" => $mentors,
          "membersIn" => $membersIn,
          "group" => $group
        ]);
      }

      // GET PENDING MEMBER  ||  MENUNGGU KONFIRMASI BERGAUNG 
      $membersOut = [];
      foreach ($usersOut as $user) {
        $membersOut[] = $user->user;
      }
      
      return view("mentor.anggota", [
        "membersIn" => $membersIn,
        "membersOut" => $membersOut,
        "group" => $group,
        "mentors" => $mentors
      ]);
    }
}
