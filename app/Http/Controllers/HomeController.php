<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer l'utilisateur connecté avec ses domaines
        $user = User::with('domains')->find(Auth::id());

        // Si l'utilisateur n'existe pas, rediriger vers la page de connexion
        if (!$user) {
            return redirect()->route('signin');
        }

        // Passer les données à la vue
        return view('home', compact('user'));
    }
}
?>