<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function handleSignUp(Request $request)
    {
        
        $validated = $request->validate([
            'user_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'domain' => 'required|string|max:255',
            'team' => 'required|string|max:255',
            'specialty' => 'required|in:doctorant,doctorante',
        ]);

        
        User::create([
            'user_name' => $validated['user_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'domain' => $validated['domain'],
            'team' => $validated['team'],
            'specialty' => $validated['specialty'],
        ]);

        
        return redirect()->back()->with('success', 'User registered successfully!');
    }
}