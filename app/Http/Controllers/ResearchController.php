<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::where('user_id', Auth::id())->get();
        return view('profile', compact('researches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'research_file' => 'required|file|mimes:pdf,docx,txt,pptx|max:2048',
        ]);

        $path = $request->file('research_file')->store('uploads', 'public');

        Research::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect()->route('profile')->with('success', 'Research added successfully!');
    }

    public function destroy($id)
    {
        $research = Research::findOrFail($id);

        if ($research->user_id !== Auth::id()) {
            abort(403);
        }

        Storage::disk('public')->delete($research->file_path);
        $research->delete();

        return redirect()->route('profile')->with('success', 'Research deleted successfully!');
    }
}