<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => "localization"], function () {
    Route::get('/', [QuoteController::class, "index"])->name('home');
    Route::get('/movies/{movie:slug}/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
    Route::post('/quotes/store', [QuoteController::class, "store"])->name('quotes.store');

    Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('movies.show');

    Route::view('/login', "auth.login")->name('auth.login')->middleware('guest');
    Route::post('/login', [AuthController::class, "login"])->name('auth.login')->middleware('guest');

    Route::view('/register', "auth.register")->name('auth.register')->middleware('guest');

    Route::get('/logout', [AuthController::class, "logout"])->name('auth.logout')->middleware('auth');

    Route::get('/dashboard', [AuthController::class, "dashboard"])->name('auth.dashboard')->middleware('auth');

    Route::get('/{locale}', [LanguageController::class, 'switchLang'])->name('switchLang');
});
