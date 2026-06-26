<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * =========================
     * TAMPILKAN HALAMAN LOGIN
     * =========================
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * =========================
     * PROSES LOGIN
     * =========================
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // PROSES LOGIN
        $request->authenticate();

        // REGENERATE SESSION
        $request->session()->regenerate();

        // AMBIL USER LOGIN
        $user = Auth::user();


        /**
         * =========================
         * ADMIN LOGIN
         * =========================
         */
        if ($user->role === 'admin') {

            return redirect()->intended('/admin/dashboard');

        }


        /**
         * =========================
         * CUSTOMER LOGIN
         * =========================
         */
        return redirect()->intended('/');

    }

    /**
     * =========================
     * LOGOUT
     * =========================
     */
    public function destroy(Request $request): RedirectResponse
    {
        // LOGOUT
        Auth::guard('web')->logout();

        // INVALIDATE SESSION
        $request->session()->invalidate();

        // REGENERATE TOKEN
        $request->session()->regenerateToken();

        // REDIRECT LANDING PAGE
        return redirect('/');

    }
}