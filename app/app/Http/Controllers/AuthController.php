<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'mail_compte' => 'required|email',
            'mdp_compte' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'mail_compte' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

public function register(Request $request)
{
    // Validation des champs du formulaire (à adapter selon vos besoins)
    $request->validate([
        'mail_compte' => 'required|email|unique:compte',
        'mdp_compte' => 'required|min:6',
        'nom_compte' => 'required',
        'prenom_compte' => 'required',
    ]);

    // Création d'un nouvel utilisateur
    $user = new \App\Models\User();
    $user->mail_compte = $request->input('mail_compte');
    $user->mdp_compte = Hash::make($request->input('mdp_compte')); // Assurez-vous de hasher le mot de passe
    $user->nom_compte = $request->input('nom_compte');
    $user->prenom_compte = $request->input('prenom_compte');
    $user->save();

    Auth::login($user);

    // Redirection vers la page de connexion après l'inscription
    return redirect('/dashboard')->with('success');
}


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
