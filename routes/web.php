<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\View\AnimeByGenreController;
use App\Http\Controllers\View\CompleteAnimeController;
use App\Http\Controllers\View\DetailAnimeController;
use App\Http\Controllers\View\GenreAnimeController;
use App\Http\Controllers\View\HomeController;
use App\Http\Controllers\View\LoginController;
use App\Http\Controllers\View\OnGoingAnimeController;
use App\Http\Controllers\View\PageController;
use App\Http\Controllers\View\PassTrouble;
use App\Http\Controllers\View\RegisterController;
use App\Http\Controllers\View\SchedulerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('view.home');
Route::get('/anime/{slug}/{slug_eps?}', DetailAnimeController::class)->name('view.watch-anime');
Route::get('/berlangsung', OnGoingAnimeController::class)->name('view.ongoing-anime');
Route::get('/tamat', CompleteAnimeController::class)->name('view.complete-anime');
Route::get('/daftar-genre', GenreAnimeController::class)->name('view.genre-list');
Route::get('/genre/{genre}', AnimeByGenreController::class)->name('view.anime-by-genre');
Route::get('/jadwal-anime', SchedulerController::class)->name('view.jadwal-anime');
Route::get('/masuk', LoginController::class)->name('view.login')->middleware('guest');
Route::get('/daftar', RegisterController::class)->name('view.register')->middleware('guest');
Route::get('/minta-ulang-sandi', [PassTrouble::class, 'forgotPassword'])->middleware('guest')->name('view.forgot-password');
Route::get('/setel-ulang-sandi/{token}', [PassTrouble::class, 'resetPassword'])->middleware('guest')->name('view.reset-password');
Route::get('/{page}', PageController::class)
    ->where('page', 'kontak|tentang-kami|kebijakan-privasi')
    ->name('view');
Route::post('/kontak', [MailerController::class, 'sendMailContact'])->name('post.mail.contact');
Route::prefix('/auth')->middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('post.register')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('post.login')->middleware('guest');
    Route::get('/redirect/{driver}', [AuthController::class, 'loginRedirect'])
    ->where('driver', 'google|facebook|twitter')
    ->name('auth.redirect');
    Route::get('/callable/{driver}', [AuthController::class, 'authWith'])
    ->where('driver', 'google|facebook|twitter')
    ->name('auth.callback');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('post.logout')->middleware('auth');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password')->middleware('guest');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('update.password')->middleware('guest');
