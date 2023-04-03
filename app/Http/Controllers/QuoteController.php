<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    //

    public function index()
    {
        return view('quotes.landing', ['quote'=> Quote::with('movie')->get()->random()]);
    }
}
