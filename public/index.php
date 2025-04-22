<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Research;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will require this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);

class UserController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur est authentifié
        if (!$user) {
            return redirect()->route('signin')->with('error', 'User not authenticated.');
        }

        // Récupérer les recherches associées à cet utilisateur
        $researches = $user->researches;

        // Envoyer les données à la vue
        return view('profile', compact('user', 'researches'));
    }

    public function addResearch(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file',
        ]);

        // Stockage du fichier de recherche
        $filePath = $request->file('file')->store('researches');

        // Création d'une nouvelle entrée de recherche
        Research::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'file_path' => $filePath,
        ]);

        // Redirection vers la page de profil
        return redirect()->route('profile');
    }
}
