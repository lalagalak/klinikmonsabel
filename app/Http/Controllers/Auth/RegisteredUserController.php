<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * =========================
     * HALAMAN REGISTER
     * =========================
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * =========================
     * PROSES REGISTER
     * =========================
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // VALIDASI
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],

        ]);


        // SIMPAN USER
        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

        ]);


        // EVENT REGISTER
        event(new Registered($user));


        // AUTO LOGIN
        Auth::login($user);


        // REDIRECT KE LANDING PAGE
        return redirect('/');

    }
}