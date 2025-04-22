<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        
        $user = User::with('domains')->find(Auth::id());

        
        if (!$user) {
            return redirect()->route('signin');
        }

        
        return view('home', compact('user'));
    }
}
?>