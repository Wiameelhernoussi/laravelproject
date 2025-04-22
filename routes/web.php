<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

Route::get('signup', [SignupController::class, 'showForm'])->name('signup');
Route::post('signup', [SignupController::class, 'handleSignUp'])->name('handle-sign-up');

Route::get('signin', [SignInController::class, 'showForm'])->name('signin');
Route::post('signin', [SignInController::class, 'signIn'])->name('signin');

// Route pour la page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes pour la page home après connexion
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Middleware 'auth' pour les pages protégées 
Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/add-research', [ProfileController::class, 'addResearch'])->name('add_research');
        Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('edit_profile');
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('update_profile');
    Route::post('/researches', [ResearchController::class, 'store'])->name('researches.store');
    Route::delete('/researches/{id}', [ResearchController::class, 'destroy'])->name('researches.destroy');
});

// Route pour la recherche
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/logout', [SignInController::class, 'logout'])->name('logout');