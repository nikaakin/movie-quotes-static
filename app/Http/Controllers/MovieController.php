<?php

namespace App\Http\Controllers;

use App\Http\Requests\movie\StoreMovieRequest;
use App\Http\Requests\movie\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function show(Movie $movie): View
    {
        return view('quotes.list', ['movie' => $movie]);
    }

    public function store(StoreMovieRequest $request): RedirectResponse
    {
        Movie::create($request->validated());
        return redirect()->route('dashboard.movies');
    }

    public function edit(Movie $movie): View
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(UpdateMovieRequest $request, Movie $movie): RedirectResponse
    {
        $movie->update($request->validated());
        return redirect()->route('dashboard.movies');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();
        return redirect()->route('dashboard.movies');
    }
}
