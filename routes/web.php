<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {  
  return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/join', [JoinController::class, 'index'])->name("join")->middleware('auth');
Route::post('/join', [JoinController::class, 'join']);

Route::get('/groups', [GroupController::class, 'index'])->name("groups")->middleware('auth');
Route::get('/create', [GroupController::class, 'create'])->name("create")->middleware('auth');
Route::post('/create', [GroupController::class, 'storeCreate']);

Route::get('/accept/{group}/{user}', [GroupController::class, 'accept'])->middleware('auth');
Route::get('/reject/{group}/{user}', [GroupController::class, 'reject'])->middleware('auth');

Route::get('/groups/{slug}', [GroupController::class, 'groups'])->name("group")->middleware('auth');
Route::post('/groups/{slug}', [GroupController::class, 'dangerGroup']);