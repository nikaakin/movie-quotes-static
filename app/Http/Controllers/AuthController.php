<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (!auth()->attempt($credentials)) {
            return back()->with('status', __('auth.failed'));
        }

        return redirect()->route('dashboard');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function dashboard(): View
    {
        $quotes = Quote::with('movie')->latest()->simplePaginate(10);
        return view('dashboard.index', ['quotes' => $quotes]);
    }

    public function movies(): View
    {
        $movies = Movie::latest()->simplePaginate(10);
        return view('dashboard.movies', ['movies' => $movies]);
    }

    public function quotes(): View
    {
        $quotes = Quote::latest()->simplePaginate(10);
        return view('dashboard.quotes', ['quotes' => $quotes]);
    }
}
