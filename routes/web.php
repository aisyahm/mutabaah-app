<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {  
  return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login-google', [LoginController::class, 'google'])->middleware("guest")->name('google');
Route::get('/auth/google/callback', [LoginController::class, 'handleProviderCallback'])->middleware("guest");
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', [LoginController::class, 'home'])->name('home')->middleware('auth');

Route::post('/join', [JoinController::class, 'join'])->name("join");

Route::get('/create', [GroupController::class, 'create'])->name("create")->middleware('auth');
Route::post('/create', [GroupController::class, 'storeCreate']);

Route::get('/accept/{group}/{user}', [GroupController::class, 'accept'])->middleware('auth');
Route::get('/reject/{group}/{user}', [GroupController::class, 'reject'])->middleware('auth');

Route::get('/groups/{group:id}', [GroupController::class, 'groups'])->name("group")->middleware('auth');
Route::post('/delete', [GroupController::class, 'dangerGroup'])->name("delete");

// Update Profile
Route::post('/update-profile', [AccountController::class, 'updateProfile'])->name("update");