<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function index() {
    return view('register.index');
  }

  public function store(Request $request) {
    if ($request->password != $request->confirm) {
      return back()->withErrors(['notMatch' => 'Input password must be same']);;
    }

    $validatedData = $request->validate([
      'name' => ['required', 'min:2', 'max:28'],
      'email' => ['required', 'email:dns', 'unique:users'],
      'password' => ['required', 'min:6', 'max:16'],
      'gender' => ['required'],
      'is_mentor' => ['required'],
      'no_telp' => ['required', 'min:7', 'max:15'],
    ]);

    $validatedData['password'] = Hash::make('password');
    User::create($validatedData);
    $request->session()->flash('register', 'Successfully Register an Account. Please Login.');

    return redirect(route("login"));
  }
}
