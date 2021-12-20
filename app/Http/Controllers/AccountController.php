<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
  public function info($user, $group) {
    $member = User::find($user);
    $group = Group::find($group);
    return view("user.profile", [
      "member" => $member,
      "group" => $group
    ]);
  }

  public function updateProfile(Request $request) {
    $user = User::find(Auth::user()->id);

    $user->update([
      "name" => $request->name,
      "avatar" => $request->avatar,
      "description" => $request->description,
      "no_telp" => $request->number
    ]);

    return back();
  }
}
