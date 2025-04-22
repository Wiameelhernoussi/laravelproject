<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        
        $results = User::where('user_name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->orWhere('domain', 'LIKE', "%{$query}%")
                        ->get();
        
        
        return view('search-results', compact('query', 'results'));
    }
}
?>
