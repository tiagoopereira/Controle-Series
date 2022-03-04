<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('login.index');
    }

    public function login(Request $request): RedirectResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->withErrors(['email' => 'E-mail e/ou senha inválidos']);
        };

        return redirect()->route('series.index');
    }
}