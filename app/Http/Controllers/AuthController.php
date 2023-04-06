<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
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
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('auth.dashboard');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function dashboard(): View
    {
        $quotes = Quote::with("movie")->latest()->simplePaginate(10);
        return view('auth.dashboard', ['quotes' => $quotes]);
    }
}
