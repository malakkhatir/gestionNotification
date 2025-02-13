<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BesoinController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Routes pour l'authentification 
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

// Route pour la déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes pour l'inscription 
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register']);

// Dashboard par rôle

    Route::get('/admin', function () {
        return view('admindash'); 
    })->name('admin'); 

    Route::get('/user', function () {
        return view('dashboard'); 
    })->name('user'); 
    
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // For profile update
    Route::put('/password', [ProfileController::class, 'password'])->name('password.update'); // For password update

    Route::get('/consulterbesoin', [BesoinController::class, 'index'])->name('besoin.index');
    Route::get('/besoin/create', [BesoinController::class, 'create'])->name('besoin.create');
    Route::put('/besoin/{ref}', [BesoinController::class, 'update'])->name('besoin.update');
    //Route::put('/besoins/{ref}', [BesoinController::class, 'update'])->name('besoins.update');
    

/*Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/