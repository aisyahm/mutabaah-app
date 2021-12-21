<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RegisterController;


// REGISTER ACCOUNT
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// LOGIN ACCOUNT
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login-google', [LoginController::class, 'google'])->name('google')->middleware("guest");
Route::get('/auth/google/callback', [LoginController::class, 'handleProviderCallback'])->middleware("guest");
Route::get('/complete', [LoginController::class, 'completeGoogle'])->name("complete")->middleware('auth');
Route::post('/complete', [LoginController::class, 'storeComplete']);

// LOGOUT ACCOUNT & FORGOT PASSWORD
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/forgot', [LoginController::class, 'forgot'])->name("forgot")->middleware("guest");

// HOME, JOIN GROUP, & CREATE GROUP
Route::get('/home', [LoginController::class, 'home'])->name('home')->middleware('auth');
Route::post('/join', [JoinController::class, 'join'])->name("join");
Route::get('/create', [GroupController::class, 'create'])->name("create")->middleware('auth');
Route::post('/create', [GroupController::class, 'storeCreate']);

// ACCEPT & REJECT TO JOIN GROUP
Route::get('/accept/{group}/{user}', [GroupController::class, 'accept'])->middleware('auth');
Route::get('/reject/{group}/{user}', [GroupController::class, 'reject'])->middleware('auth');

// USER INFO & UPDATE PROFILE USER
Route::get('/groups/profile/{user}/{group}', [AccountController::class, 'info'])->name("user-info")->middleware('auth');
Route::post('/update-profile', [AccountController::class, 'updateProfile'])->name("update");

// OPEN GROUP 
Route::get('/groups/{group:id}', [GroupController::class, 'groups'])->name("group")->middleware('auth');

// CHART
Route::get('/groups/chart/{userId}/{groupId}', [ChartController::class, 'self'])->name('chart')->middleware('auth');

// DELETE & LEAVE GROUP
Route::post('/delete', [GroupController::class, 'dangerGroup'])->name("delete");

// ADD, EDIT, & VIEW ACTIVITIES
Route::get('/groups/add-activities/{group:id}', [ActivityController::class, 'add'])->name('add-activities')->middleware('auth');
Route::get('/groups/edit-activities/{group:id}', [ActivityController::class, 'edit'])->name('add-activities')->middleware('auth');
Route::post('/groups/add-activities', [ActivityController::class, 'storeAdd']);
Route::get('/groups/activities/{group:id}', [ActivityController::class, 'activities'])->name('group-activities')->middleware('auth');

// Laporan Mentor Export Excel 
Route::get('/home/mentoranalisis', [LaporanController::class, 'index']);