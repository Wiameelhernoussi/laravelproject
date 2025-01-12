<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function showForm()
    {
        return view('sign-in');
    }

    public function signIn(Request $request)
    {
        // Validation des données
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            // Authentification réussie
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        // Authentification échouée
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
?>