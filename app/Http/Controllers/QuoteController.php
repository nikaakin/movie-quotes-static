<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteController extends Controller
{
    //

    public function index(): View
    {
        return view('quotes.landing', ['quote' => Quote::with('movie')->get()->random()]);
    }

    public function create(Movie $movie): View
    {
        return view('quotes.create', ['movie' => $movie]);
    }

    public function store(StoreQuoteRequest $request): RedirectResponse
    {
        $data =  $request->validated();


        Quote::create([
            'movie_id' => $data['movie_id'],
            'quote' => $data['quote'],
            'photo' => $data['photo']->store('photos'),
        ]);

        return redirect()->route('movies.show', ['movie' => $data['movie_slug']]);
    }
}
