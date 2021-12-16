<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function info($user) {
    $member = User::find($user);
    return view("user.profile")->with("member", $member);
  }
}
