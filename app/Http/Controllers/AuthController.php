<?php

namespace App\Http\Controllers; // Change le namespace si tu as une structure spécifique

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Méthode pour afficher le formulaire de signup
    public function showSignUpForm()
    {
        return view('auth.signup');  // Remplace par la vue correcte si nécessaire
    }

    // Méthode pour traiter le formulaire de signup
    public function handleSignUp(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',  // Ajout de 'confirmed' pour validation du mot de passe
            'domain' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            'specialty' => 'required|in:doctorant,doctorante',
        ], [
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'email.unique' => 'Cet e-mail est déjà utilisé.',
        ]);

        // Création de l'utilisateur
        User::create([
            'user_name' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'domain' => $validated['domain'],
            'team' => $validated['team'],
            'specialty' => $validated['specialty'],
        ]);

        // Redirection ou réponse
        return redirect()->route('signin')->with('success', 'Votre compte a été créé avec succès !');
    }
    public function showSignInForm()
    {
        return view('auth.signin');
    }

    public function handleSignIn(Request $request)
    {
        // Validation et logique de connexion ici
    }
    public function logout(Request $request)
    {
        // Clear session data
        $request->session()->flush();

        // Redirect to login page
        return redirect()->route('signin');
    }
}