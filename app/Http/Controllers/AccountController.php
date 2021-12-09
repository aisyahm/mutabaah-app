<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function updateProfile(Request $request) {
      // dd($request->all());
      $user = User::find(Auth::user()->id);

      // dd($request->all());
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
