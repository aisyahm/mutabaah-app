<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login() {
      return view("user.login");
    }

    public function authenticate(Request $request) {
      $credentials = $request->validate([
        'email' => ['required', 'email:rfc,dns'],
        'password' => 'required',
      ]);
      
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route("home"));
      }
      
      $request->flash("email");
      return back()->withErrors(['loginFail' => 'Email or password is wrong']);
    }

    public function google(){
      return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(){
        $callback = Socialite::driver('google')->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => Str::after($callback->getAvatar(), 'https://'),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];

        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);

        return redirect(route("home"));
    }

    public function logout(Request $request) {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
  
      return redirect(route("login"));
    }

    public function home() {
      return Auth::user()->is_mentor ? view("mentor.index") : view("member.index");
    }

    public function forgot() {
      return back();
    }
}
