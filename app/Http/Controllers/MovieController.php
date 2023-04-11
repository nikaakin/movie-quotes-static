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
        $validated = $request->validated();
        $data = [
            'slug' => $validated['slug'],
            'title' => $validated['title']['en'],
            'title_geo' => $validated['title']['ka']
        ];

        Movie::create($data);

        return redirect()->route('dashboard.movies');
    }

    public function edit(Movie $movie): View
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(UpdateMovieRequest $request, Movie $movie): RedirectResponse
    {
        $validated = $request->validated();
        $data = [
            'title' => $validated['title']['en'],
            'title_geo' => $validated['title']['ka']
        ];
        $movie->update($data);

        return redirect()->route('dashboard.movies');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();

        return redirect()->route('dashboard.movies');
    }
}
