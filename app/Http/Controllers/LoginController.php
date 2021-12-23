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
    // HALAMAN LOGIN
    public function login() {
      return view("user.login");
    }

    // STORE DATA LOGIN FORM
    public function authenticate(Request $request) {
      // VALIDASI INPUT FORM
      $credentials = $request->validate([
        'email' => ['required', 'email:rfc,dns'],
        'password' => ['required'],
      ]); 
      
      // CEK KECOCOKAN EMAIL DAN PASSWORD  ||  JIKA BERHASIL MAKA IZINKAN LOGIN
      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();
         return redirect()->intended(route("home"));
      }

      // NOTIFIKASI JIKA EMAIL DAN PASSWORD TIDAK COCOK
      $request->flash("email");
      return back()->withErrors(['loginFail' => 'Email or password is wrong']);
    }

    // HALAMAN LOGIN BY GOOGLE
    public function google(){
      return Socialite::driver('google')->redirect();
    }

    // STORE DATA LOGIN BY GOOGLE
    public function handleProviderCallback(){
        $callback = Socialite::driver('google')->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => Str::after($callback->getAvatar(), 'https://'),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];

        // CARI USER BERDASARKAN EMAIL. JIKA TIDAK ADA MAKA MASUKKAN DATA AKUN KE TABEL USER  ||  LOGIN DIIZINKAN
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Auth::login($user, true);

        // JIKA BUKAN PERTAMA KALI LOGIN DENGAN GOOGLE  ||  LENGKAPI DATA YANG DIBUTUHKAN
        if ($user->gender != null) {
          $user->update(["avatar" => $data["avatar"]]);
          return redirect(route("home"));
        }

        // JIKA SUDAH PERNAH LOGIN DENGAN GOOGLE
        session(['email' => $data['email']]);
        return redirect(route("complete"));
    }

    // HALAMAN LENGKAPI DATA  ||  LOGIN BY GOOGLE FIRST TIME
    public function completeGoogle(){
      return view("user.complete-login")->with("email", session("email"));
    }

    // STORE FORM LENGKAPI DATA  ||  LOGIN BY GOOGLE FIRST TIME
    public function storeComplete(Request $request) {
      $validatedData = $request->validate([
         'gender' => ['required'],
         'is_mentor' => ['required'],
         'no_telp' => ['required', 'min:7', 'max:15'],
       ]);

      // UPDATE DATA BERDASARKAN EMAIL
      $user = User::where("email", $request->email)->first();
      $user->update($validatedData);

      return redirect(route("home"));
    }

    // FUNGSI LOGOUT AKUN
    public function logout(Request $request) {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
  
      return redirect(route("login"));
    }

    // HALAMAN PERTAMA KETIKA BERHASIL LOGIN
    public function home() {
      return Auth::user()->is_mentor ? view("mentor.index") : view("member.index");
    }
}
