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
        'password' => ['required'],
      ]); 

      $remember_me = $request->has('remember_me') ? true : false;
      if (Auth::attempt($credentials, $remember_me)) {
         //$request->session()->regenerate();
         return redirect()->route("home");
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

        // JIKA BUKAN PERTAMA KALI LOGIN DENGAN GOOGLE
        if ($user->gender != null) {
          $user->update(["avatar" => $data["avatar"]]);
          return redirect(route("home"));
        }

        // JIKA SUDAH PERNAH LOGIN DENGAN GOOGLE
        session(['email' => $data['email']]);
        return redirect(route("complete"));
    }

    public function completeGoogle(){
      return view("user.complete-login")->with("email", session("email"));
    }

    public function storeComplete(Request $request) {
      $validatedData = $request->validate([
         'gender' => ['required'],
         'is_mentor' => ['required'],
         'no_telp' => ['required', 'min:7', 'max:15'],
       ]);

      $user = User::where("email", $request->email)->first();
      $user->update($validatedData);

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
