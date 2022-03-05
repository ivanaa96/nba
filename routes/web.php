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

Route::controller(AuthController::class)->group(function () {
   //Za metode koje vracaju samo view, mozemo pisati ovaj shortcut. Prvi parametar je URL, a drugi je ime view-a. Ne moramo ovako:// Route::get('/register', [AuthController::class, 'getRegiLsterForm']); U kontroleru ne pisemo onda nikakve metode za dobavljanje view-a
   Route::view('/register', 'auth.register');
   Route::post('/register', 'register');
   Route::view('/login', 'auth.login');
   Route::post('/login', 'login')->name('login');
   Route::post('/logout', 'logout');
});

Route::post('/teams/{team_id}/comments', [CommentController::class, 'store']);

//Grupisanje kontrolera:
Route::controller(NewsController::class)->group(function () {
   Route::get('/news', 'index');
   Route::get('/news/create',  'create');
   Route::post('/news',  'store');
   Route::get('/news/{id}', 'show')->name('news.show');
   Route::get('/news/team/{teamName}', 'getNewsByTeam')->name('newsForTeam');
});

//sa Laravel dokumentacije za email verifikaciju:
// Route::get('/email/verify', function () {
//    return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();

//    return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

//U slucaju da korisnik trazi rutu koja ne postoji ili nije dostupna. ovo uvek mora da ide na kraj, tj. posle svih ruta!
Route::fallback(function () {
   return "The page you are looking for is not available! Please, try later.";
});
