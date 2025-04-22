<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function showForm()
    {
        return view('sign-up');
    }

    public function handleSignUp(Request $request)
    {
        
        $validated = $request->validate([
            'username' => 'required|string|max:100',
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'domain' => 'required|string|max:255',
            'specialty' => 'required|in:doctorant,doctorante',
        ]);

        
        $team = $this->assignTeam($validated['domain']);

        
        User::create([
            'user_name' => $validated['username'],
            'name' => $validated['name'], 
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'domain' => $validated['domain'],
            'team' => $team,
            'specialty' => $validated['specialty'],
        ]);

        
        return redirect()->back()->with('success', 'Your account has been created successfully!');
    }

    private function assignTeam($domain)
    {
        switch ($domain) {
            case 'informatique':
                return 'equip1';
            case 'mathematique':
                return 'equip2';
            case 'physique':
                return 'equip3';
            case 'ingenierie':
                return 'equip4';
            default:
                return 'default_team';
        }
    }
}
?>