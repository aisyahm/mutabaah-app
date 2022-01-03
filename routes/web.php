<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
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
Route::post('/create', [GroupController::class, 'storeCreate'])->name("create");

// ACCEPT & REJECT TO JOIN GROUP
Route::get('/accept/{group}/{user}', [GroupController::class, 'accept'])->middleware('auth');
Route::get('/reject/{group}/{user}', [GroupController::class, 'reject'])->middleware('auth');

// USER INFO & UPDATE PROFILE USER
Route::get('/groups/profile/{user}/{group}', [AccountController::class, 'info'])->name("user-info")->middleware('auth');
Route::post('/update-profile', [AccountController::class, 'updateProfile'])->name("update");

// OPEN GROUP 
Route::get('/groups/anggota/{group:id}', [GroupController::class, 'anggota'])->name("anggota")->middleware('auth');
Route::get('/groups/chart/{group:id}', [ChartController::class, 'overall'])->name('chart-overall')->middleware('auth');
Route::get('/groups/analysis/{userId}/{groupId}', [ChartController::class, 'self'])->name('chart-member')->middleware('auth');

// DELETE & LEAVE GROUP
Route::post('/delete', [GroupController::class, 'dangerGroup'])->name("delete");
Route::post('/edit-grup', [GroupController::class, 'edit'])->name("edit-grup");


// ADD, EDIT, VIEW ACTIVITIES, & SUBMIT SUBMISSION
Route::get('/groups/add-activities/{group:id}', [ActivityController::class, 'add'])->name('add-activities')->middleware('auth');
Route::post('/groups/add-activities', [ActivityController::class, 'storeAdd']);
Route::get('/groups/activities/{group:id}', [ActivityController::class, 'activities'])->name('group-activities')->middleware('auth');

// Mentor & Member Laporan Export Excel 
Route::get('/home/memberlaporan/{user:id}/{group:id}', [LaporanController::class, 'laporanMember'])->name('memberanalisis')->middleware('auth');
Route::get('/home/member/export', [LaporanController::class, 'memberexport'])->name('exportlaporanmember')->middleware('auth');
Route::get('/home/mentorlaporan/{group:id}', [LaporanController::class, 'laporanMentor'])->name('mentoranalisis')->middleware('auth');
Route::get('/home/mentor/export', [LaporanController::class, 'mentorexport'])->name('exportlaporanmentor')->middleware('auth');

Route::post('/submit-submission', [ActivityController::class, 'newSubmission'])->name('new-submission')->middleware('auth');

// DOWNLOAD LAPORAN EXCEL
Route::get('/download-report/{userId}/{groupId}', [ReportController::class, 'member'])->name('report-member')->middleware('auth');
Route::get('/download-report/{group:id}', [ReportController::class, 'group'])->name('report-group')->middleware('auth');

// DELETE & LEAVE GROUP
Route::post('/delete', [GroupController::class, 'dangerGroup'])->name("delete");
