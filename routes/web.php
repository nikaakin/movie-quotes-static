<?php

use App\Http\Controllers\LanguageController;
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

Route::group(['middleware'=> "localization"], function () {
    Route::get('/', function () {
        return view('quotes.landing');
    });

    Route::get('/movies/{title}', function ($title) {
        return view("quotes.list");
    });

    Route::get('/{locale}', [LanguageController::class, 'switchLang']);
});
