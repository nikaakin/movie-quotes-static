<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang(string $locale)
    {
        if (array_key_exists($locale, config('language'))) {
            Session()->put('applocale', $locale);
            // dd(request()->session()->get("applocale"));
        }
        return back();
    }
}
