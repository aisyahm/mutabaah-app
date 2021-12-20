<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    public function groups(Group $group) {
      $users = UserGroup::where("group_id", $group->id)->get();
      $usersOut = $users->where("is_accept", false);
      $usersIn = $users->where("is_accept", true);

      $mentors = [];
      foreach ($usersIn as $mentor) {
        if ($mentor->user->is_mentor) $mentors[] = $mentor->user->name;
      }

      $membersIn = [];
      foreach ($usersIn as $user) {
        $user->user->is_mentor == false ? $membersIn[] = $user->user : "";
      }

      if (!Auth::user()->is_mentor) {
        return view("member.list", [
          "mentors" => $mentors,
          "membersIn" => $membersIn,
          "group" => $group
        ]);
      }

      $membersOut = [];
      foreach ($usersOut as $user) {
        $membersOut[] = $user->user;
      }

      return view("mentor.list", [
        "membersIn" => $membersIn,
        "membersOut" => $membersOut,
        "group" => $group,
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
          $request->session()->flash("exist");
          $request->flash("name", $request->name);
          $request->flash("desc", $request->desc);
          return back();
        }
      }
      
      $code = Str::random(6);
      while (Group::where("invitation_code", $code)->exists()) {
        $code = Str::random(6);
      }
      
      Group::create([
        "name" => $request->name,
        "description" => $request->desc,
        "avatar" => $request->avatar,
        "invitation_code" => $code,
      ]);
      UserGroup::create([
        "user_id" => Auth::user()->id,
        "group_id" => Group::where("name", $request->name)->first()->id,
        "is_accept" => true
      ]);

      return back();
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
      } 
      else if ($request->leave) {
        $userGroup = UserGroup::where("user_id", Auth::user()->id)->where("group_id", $request->group_id)->get()->first();
        
        $userGroup->delete();
      }
      else if ($request->kick) {
        $user = UserGroup::where("user_id", $request->user_id)->where("group_id", $request->group_id)->first();
  
        $user->delete();
      }
      
      return redirect(route("home"));
    }
}
