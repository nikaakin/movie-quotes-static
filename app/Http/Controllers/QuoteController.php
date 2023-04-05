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
    public function index(): View
    {
        $random = Quote::with('movie')->get()->random();
        return view('quotes.landing', ['quote' => $random]);
    }

    public function create(Movie $movie): View
    {
        return view('quotes.create', ['movie' => $movie]);
    }

    public function store(StoreQuoteRequest $request): RedirectResponse
    {
        $data =  $request->validated();

        $quoteData = [
            'movie_id' => $data['movie_id'],
            'quote' => $data['quote'],
        ];

        if (array_key_exists('photo', $data)) {
            $quoteData['photo'] = $data['photo']->store('photos');
        }
        Quote::create($quoteData);

        return redirect()->route('movies.show', ['movie' => $data['movie_slug']]);
    }
}
