<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Assurez-vous que cette vue existe
    }

    public function register(Request $request)
{
    // Validation des données
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Définir le rôle selon le domaine de l'email
    $emailDomain = Str::after($request->email, '@'); // Extraire le domaine de l'email

    // Logique pour définir le rôle en fonction du domaine de l'email
    if ($emailDomain === 'admin.com') {
        $role = 'admin';  // Rôle admin si l'email appartient à healthapp.com
    } 
    else{
        $role = 'user';
    }

    // Créer l'utilisateur avec le rôle par défaut 'user'
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']), // Assurez-vous de hacher le mot de passe
        'role' => 'user', // Le rôle par défaut défini dans la base de données
    ]);

    // Mettre à jour le rôle après la création
    $user->role = $role;
    $user->save();

    // Connexion automatique de l'utilisateur
    Auth::login($user);

    // Redirection après inscription
    return redirect('/home');
}

}