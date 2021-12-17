<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function updateProfile(Request $request) {
      $user = User::find(Auth::user()->id);

      $user->update([
        "name" => $request->name,
        "avatar" => $request->avatar,
        "email" => $request->email,
        "deskripsi" => $request->deskripsi,
        "no_telp" => $request->number
      ]);

      return back();
    }
}