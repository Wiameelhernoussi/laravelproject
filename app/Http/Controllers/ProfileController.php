<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();

        
        if (!$user) {
            return redirect()->route('signin')->with('error', 'User not authenticated.');
        }

        
        $researches = $user->researches;

       
        return view('profile', compact('user', 'researches'));
    }

    public function addResearch(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file',
        ]);

        $filePath = $request->file('file')->store('researches');

        Research::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'file_path' => $filePath,
        ]);

        return redirect()->route('profile');
    }

    public function editProfile()
    {
        
        $user = Auth::user();

        
        if (!$user) {
            return redirect()->route('signin')->with('error', 'User not authenticated.');
        }

        
        return view('edit_profile', compact('user'));
    }
}
?>