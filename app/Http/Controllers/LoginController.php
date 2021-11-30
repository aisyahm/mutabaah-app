<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login() {
      return view("user.login");
    }

    public function authenticate(Request $request) {
      $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
      ]);
      
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        // if (Auth::user()->is_mentor) return redirect()->intended(route("create"));

        // return redirect()->intended(route("join"));
        return redirect()->intended(route("groups"));
      }
      
      $request->flash("username");
      return back()->withErrors(['loginFail' => 'Username or password is wrong']);
    }

    public function logout(Request $request) {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
  
      return redirect(route("login"));
    }
}
