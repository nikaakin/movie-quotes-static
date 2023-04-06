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



    Route::group(['middleware' => "guest"], function () {
        Route::view('/login', "auth.login")->name('auth.login');
        Route::post('/login', [AuthController::class, "login"])->name('auth.login');

        Route::view('/register', "auth.register")->name('auth.register');
    });

    Route::group(['middleware' => "auth"], function () {
        Route::get('/logout', [AuthController::class, "logout"])->name('auth.logout');

        Route::get('/dashboard', [AuthController::class, "dashboard"])->name('dashboard');
        Route::get('/dashboard/quotes', [AuthController::class, "quotes"])->name('dashboard.quotes');
        Route::get('/dashboard/movies', [AuthController::class, "movies"])->name('dashboard.movies');

        Route::view('/movies/create', 'movies.create')->name('movies.create');
        Route::post('/movies/store', [MovieController::class, 'store'])->name('movies.store');
        Route::get('/movies/edit/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
        Route::patch('/movies/update/{movie}', [MovieController::class, 'update'])->name('movies.update');
        Route::delete('/movies/destroy/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

        Route::get('/movies/{movie:slug}/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
        Route::post('/quotes/store', [QuoteController::class, "store"])->name('quotes.store');
        Route::get('/quotes/edit/{quote}', [QuoteController::class, "edit"])->name('quotes.edit');
        Route::patch('/quotes/update/{quote}', [QuoteController::class, "update"])->name('quotes.update');
        Route::delete('/quotes/delete/{quote}', [QuoteController::class, "destroy"])->name('quotes.destroy');
    });



    Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('movies.show');

    Route::get('/{locale}', [LanguageController::class, 'switchLang'])->name('switchLang');
});
