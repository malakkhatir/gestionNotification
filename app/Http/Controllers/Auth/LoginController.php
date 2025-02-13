<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
{
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Tentative de connexion avec les identifiants fournis
    if (Auth::attempt([
        'email' => $validatedData['email'],
        'password' => $validatedData['password']
    ])) {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Redirection en fonction du rôle
        if ($user->role === 'admin') {
            return redirect()->route('admin'); // Route pour admin
        } 
        else {
            return redirect()->route('user'); // Route pour utilisateur standard
        }
    }

    // Si les identifiants sont incorrects, rediriger avec un message d'erreur
    return redirect('/login')->withErrors([
        'email' => 'Les identifiants sont incorrects.',
    ])->withInput($request->except('password'));
}
public function logout(Request $request)
{
    // Obtenir le rôle de l'utilisateur avant de le déconnecter
    $role = Auth::user()->role;

    // Déconnexion de l'utilisateur
    Auth::logout();

    // Invalider la session pour plus de sécurité
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirection basée sur le rôle de l'utilisateur
    if ($role === 'admin') {
        return redirect('/login')->with('message', 'Admin déconnecté avec succès.');
    }
    else {
        return redirect('/login')->with('message', 'Utilisateur déconnecté avec succès.');
    }
}
}