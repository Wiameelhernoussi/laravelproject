<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExistingAuthController extends Controller
{
    public function showSignInForm()
    {
        return view('signin'); // Assure-toi que 'signin' correspond au fichier Blade existant.
    }

    public function handleSignIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/home'); // Remplace '/home' par la route que tu souhaites.
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
}
?>