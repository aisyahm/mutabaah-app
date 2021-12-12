<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;

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

Route::get('/', function () {  return view('welcome'); });

Route::get('/submission', [SubmissionController::class, 'index'])-> name('submission.index');
Route::post('/submission/add', [SubmissionController::class, 'add'])->name('submission.add');


