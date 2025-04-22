<?php

namespace App\Http\Controllers\Auth; // Change le namespace si tu as une structure spécifique

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function showSignUpForm()
    {
        return view('auth.signup');  
    }
    public function showSignInForm()
{
    return view('auth.signin'); 
}
public function handleSignIn(Request $request)
{
    
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('home')->with('success', 'You are now signed in!');
    }

    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    
    public function handleSignUp(Request $request)
    {
        
        $validated = $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',  
            'domain' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            'specialty' => 'required|in:doctorant,doctorante',
        ], [
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'email.unique' => 'Cet e-mail est déjà utilisé.',
        ]);

        
        User::create([
            'user_name' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'domain' => $validated['domain'],
            'team' => $validated['team'],
            'specialty' => $validated['specialty'],
        ]);

        
        return redirect()->route('signin')->with('success', 'Votre compte a été créé avec succès !');
    }
}