<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteController extends Controller
{
    //

    public function index(): View
    {
        return view('quotes.landing', ['quote' => Quote::with('movie')->get()->random()]);
    }
}
