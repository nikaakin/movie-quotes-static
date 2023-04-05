<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials =    $request->validated();

        if (!auth()->attempt($credentials)) {
            return back()->with('status', 'Invalid login details');
        }
        return redirect()->route('home');
    }
}
