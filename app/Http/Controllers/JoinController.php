<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinController extends Controller
{
    public function index() {
      if (Auth::user()->is_mentor) return back();

      return view("member.groups.join");
    }

    public function join(Request $request) {
      $find = Group::all()->where("invitation_code", $request->code);
      $group = count($find) ? $find->first()->id : false;
      $user = Auth::user()->id;

      if (!$group) {
        $request->session()->flash("group", $group);
        $request->flash("code", $request->code);

        return back();
      }
      
      $pendingGroup = UserGroup::where("group_id", $group)->where("user_id", $user)->get();
      if (count($pendingGroup)) {
        if ($pendingGroup->where("is_accept", false)->first()) {
          $request->session()->flash("pending", true);
        } else {
          $request->session()->flash("pending", false);
        }

        $request->flash("code", $request->code);
        return back();
      }

      UserGroup::create([
        "user_id" => $user,
        "group_id" => $group,
      ]);      

      return redirect(route("groups"));
    }
}
