<?php

namespace App\Http\Controllers; 

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
    public function showSignInForm()
    {
        return view('auth.signin');
    }

    public function handleSignIn(Request $request)
    {
        
    }
    public function logout(Request $request)
    {
        
        $request->session()->flush();

        
        return redirect()->route('signin');
    }
}