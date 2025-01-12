<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assurez-vous d'importer le modèle User

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Logique de recherche ici
        // Par exemple, rechercher dans le modèle User
        $results = User::where('user_name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->orWhere('domain', 'LIKE', "%{$query}%")
                        ->get();
        
        // Retourner les résultats de la recherche à une vue
        return view('search-results', compact('query', 'results'));
    }
}
?>
