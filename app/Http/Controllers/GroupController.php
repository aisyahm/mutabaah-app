<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index() {
      // $groups = Auth::user()->usergroup;
      $groups = UserGroup::with("group")->where("user_id", Auth::user()->id)->get();
      // dd($groups);
      $groupsIn = [];
      $groupsOut = [];

      foreach ($groups as $group) {
        $group->is_accept == true ? $groupsIn[] = $group : $groupsOut[] = $group;
      }

      if (Auth::user()->is_mentor) return view("mentor.groups.list")->with("groupsIn", $groupsIn);

      return view("member.groups.list", [
        "groupsIn" => $groupsIn,
        "groupsOut" => $groupsOut
      ]);
    }

    // public function groups($slug) {
    //   $group = Group::where("name", $slug)->first();
    //   $usersIn = $group->usergroup->where("is_accept", true);
    //   $usersOut = $group->usergroup->where("is_accept", false);

    //   $admin = $group->usergroup->where("group_id", $group->id);
    //   $mentors = [];
    //   foreach ($admin as $mentor) {
    //     if ($mentor->user->is_mentor && $mentor->user->id != Auth::user()->id) {
    //       $mentors[] = $mentor->user->name;
    //     }
    //   }

    //   $membersIn = [];
    //   foreach ($usersIn as $user) {
    //     $user->user->is_mentor == false ? $membersIn[] = $user->user : "";
    //   }

    //   if (Auth::user()->is_mentor == false) {
    //     return view("member.groups.detail", [
    //       "membersIn" => $membersIn,
    //       "group" => $group,
    //       "mentors" => $mentors
    //     ]);
    //   }

    //   $membersOut = [];
    //   foreach ($usersOut as $user) {
    //     $membersOut[] = $user->user;
    //   }

    //   return view("mentor.groups.detail", [
    //     "membersIn" => $membersIn,
    //     "membersOut" => $membersOut,
    //     "group" => $group,
    //     "mentors" => $mentors
    //   ]);
    // }

    public function groups($group) {
      $groupId = Group::where("name", $group)->first();
      $usersIn = UserGroup::with("user")->where("group_id", $groupId->id)->where("is_accept", true)->get();
      $usersOut = UserGroup::with("user")->where("group_id", $groupId->id)->where("is_accept", false)->get();

      $mentors = [];
      foreach ($usersIn as $mentor) {
        if ($mentor->user->is_mentor && $mentor->user->id != Auth::user()->id) {
          $mentors[] = $mentor->user->name;
        }
      }

      $membersIn = [];
      foreach ($usersIn as $user) {
        $user->user->is_mentor == false ? $membersIn[] = $user->user : "";
      }

      if (Auth::user()->is_mentor == false) {
        return view("member.groups.detail", [
          "membersIn" => $membersIn,
          "group" => $groupId,
          "mentors" => $mentors
        ]);
      }

      $membersOut = [];
      foreach ($usersOut as $user) {
        $membersOut[] = $user->user;
      }

      return view("mentor.groups.detail", [
        "membersIn" => $membersIn,
        "membersOut" => $membersOut,
        "group" => $groupId,
        "mentors" => $mentors
      ]);
    }

    public function create() {
      if (Auth::user()->is_mentor == false) return back();

      return view("mentor.groups.create");
    }

    public function storeCreate(Request $request) {
      $groups = Group::all();

      foreach ($groups as $group) {
        if ($group->name == $request->name) {
          $request->session()->flash("existTeam");
          $request->flash("name", $request->name);
          return back();
        }
        if ($group->invitation_code == $request->code) {
          $request->session()->flash("existCode");
          $request->flash("code", $request->code);
          return back();
        }
      }

      Group::create([
        "name" => $request->name,
        "invitation_code" => $request->code,
      ]);
      UserGroup::create([
        "user_id" => Auth::user()->id,
        "group_id" => Group::where("name", $request->name)->first()->id,
        "is_accept" => true
      ]);

      return redirect(route("groups"));
    }

    public function accept($group, $user) {
      if (Auth::user()->is_mentor == false) return back();

      $member = UserGroup::where("user_id", $user)->where("group_id", $group)->first();
      $member->update(["is_accept" => true]);
      return back();
    }

    public function reject($group, $user) {
      if (Auth::user()->is_mentor == false) return back();

      $member = UserGroup::where("user_id", $user)->where("group_id", $group)->first();
      $member->delete();
    
      return back();
    }

    public function dangerGroup(Request $request) {
      if ($request->delete) {
        $userGroup = UserGroup::where("group_id", $request->group_id);
        $group = Group::find($request->group_id);
        
        $userGroup->delete();
        $group->delete();
      } else {
        $user = Auth::user()->id;
        $userGroup = UserGroup::where("user_id", $user)->where("group_id", $request->group_id)->get()->first();
  
        $userGroup->delete();
      }
      
      return redirect(route("groups"));
    }
}
