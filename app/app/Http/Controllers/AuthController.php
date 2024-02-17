<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;

class AuthController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/dashboard'); // Rediriger si l'utilisateur est déjà connecté
        }

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
        $request->validate([
            'mail_compte' => 'required|email',
            'mdp_compte' => 'required',
        ]);
        $user = User::where('mail_compte', $request->mail_compte)->first();

        if ($user && Hash::check($request->mdp_compte, $user->mdp_compte)) {
            Auth::login($user);
            return redirect('/dashboard');
        } else {
            return redirect('/login')->with('error', 'Email ou mot de passe incorrect.');
        }

    }
    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect('/dashboard'); // Rediriger si l'utilisateur est déjà connecté
        }
        
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
        $request->validate([
            'mail_compte' => 'required|email|unique:compte',
            'mdp_compte' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'nom_compte' => 'required',
            'prenom_compte' => 'required',
        ], [
            'mdp_compte.confirmed' => 'Les mots de passe ne correspondent pas.',
            'mdp_compte.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.',
        ]);
        

        $user = new \App\Models\User();
        $user->mail_compte = $request->input('mail_compte');
        $user->mdp_compte = Hash::make($request->input('mdp_compte')); 
        $user->nom_compte = $request->input('nom_compte');
        $user->prenom_compte = $request->input('prenom_compte');
        $user->save();

        Auth::login($user);

        return redirect('/dashboard')->with('success');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
