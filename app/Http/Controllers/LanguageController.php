<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang(string $locale): RedirectResponse
    {
        if (array_key_exists($locale, config('language'))) {
            Session()->put('applocale', $locale);
        }
        return back();
    }
}
