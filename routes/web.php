<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\SubmissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// contoh excel
Route::get('/mentoranalisis', [SubmissionController::class, 'index']);
Route::get('/mentoranalisis/exportsubmission', [SubmissionController::class, 'submissionexport']);
// Route::post('/importactivity',);

// Route::get('/', function () {  
//   return view('welcome');
// });
