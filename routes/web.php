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
        Route::group(['prefix' => "login"], function () {
            Route::view('/', 'auth.login')->name('auth.showLogin');
            Route::post('/', [AuthController::class, "login"])->name('auth.login');
        });
        Route::view('/register', "auth.register")->name('auth.register');
    });

    Route::group(['middleware' => "auth"], function () {
        Route::get('/logout', [AuthController::class, "logout"])->name('auth.logout');

        Route::group(['prefix' => "dashboard", 'controller' => AuthController::class], function () {
            Route::get('/quotes', "quotes")->name('dashboard.quotes');
            Route::get('/movies', "movies")->name('dashboard.movies');
        });

        Route::group(['prefix' => "movies", 'controller' => MovieController::class], function () {
            Route::view('/create', 'movies.create')->name('movies.create');
            Route::post('/store', 'store')->name('movies.store');
            Route::get('/edit/{movie}', 'edit')->name('movies.edit');
            Route::patch('/update/{movie}', 'update')->name('movies.update');
            Route::delete('/destroy/{movie}', 'destroy')->name('movies.destroy');
        });

        Route::get('/movies/{movie:slug}/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');

        Route::group(['prefix' => 'quotes', 'controller' => QuoteController::class], function () {
            Route::post('/store', 'store')->name('quotes.store');
            Route::get('/edit/{quote}', 'edit')->name('quotes.edit');
            Route::patch('/update/{quote}', 'update')->name('quotes.update');
            Route::delete('/destroy/{quote}', 'destroy')->name('quotes.destroy');
        });
    });



    Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('movies.show');

    Route::get('/{locale}', [LanguageController::class, 'switchLang'])->name('switchLang');
});
