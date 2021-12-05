<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

// Route::get('/groups/{slug}', [GroupController::class, 'groups'])->name("group")->middleware('auth');
Route::get('/groups/{group:name}', [GroupController::class, 'groups'])->name("group")->middleware('auth');
Route::post('/groups/{slug}', [GroupController::class, 'dangerGroup']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');

Route::get('/auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

require __DIR__.'/auth.php';
