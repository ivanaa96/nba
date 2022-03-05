<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/teams', [TeamController::class, 'index']);
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('team');
Route::get('/players/{player}', [PlayerController::class, 'show'])->name('player');

//Za metode koje vracaju samo view, mozemo pisati ovaj shortcut. Prvi parametar je URL, a drugi je ime view-a. Ne moramo ovako:// Route::get('/register', [AuthController::class, 'getRegiLsterForm']);
Route::view('/register', 'auth.register');
Route::post('/register', [AuthController::class, 'register']);
Route::view('/login', 'auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/teams/{team_id}/comments', [CommentController::class, 'store']);

//sa Laravel dokumentacije za email verifikaciju:
// Route::get('/email/verify', function () {
//    return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();

//    return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/create', [NewsController::class, 'create']);
Route::post('/news', [NewsController::class, 'store']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/news/team/{teamName}', [NewsController::class, 'getNewsByTeam'])->name('newsForTeam');
