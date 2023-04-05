<?php

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

    Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('movies.show');

    Route::get('/{locale}', [LanguageController::class, 'switchLang'])->name('switchLang');
});
