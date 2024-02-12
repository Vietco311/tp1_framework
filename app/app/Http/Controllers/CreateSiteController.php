<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class CreateSiteController extends Controller
{
    public function index()
    {
        return view('createsite');
    }

    public function store(Request $request)
{
    $request->validate([
        'nom_blog' => 'required|string|max:255',
        'url_blog' => 'required|url|max:255',
        'sujet_blog' => 'nullable|string|max:255',
        'couleur_blog' => 'required|string|max:255', 
        'couleur_separation_blog' => 'required|string|max:255',
        'taille_separation_blog' => 'required|string|max:255',
        'template_blog' => 'nullable|string|max:255', 
        // Ajoutez d'autres règles de validation si nécessaire
    ]);

    // Créez un nouveau blog
    $blog = Blog::create([
        'mail_compte' => auth()->user()->mail_compte, // Assurez-vous que l'utilisateur est connecté
        'nom_blog' => $request->input('nom_blog'),
        'url_blog' => $request->input('url_blog'),
        'sujet_blog' => $request->input('sujet_blog'),
        'couleur_blog' => $request->input('couleur_blog'),
        'couleur_separation_blog' => $request->input('couleur_separation_blog'),
        'taille_separation_blog' => $request->input('taille_separation_blog'),
        'template_blog' => $request->input('template_blog'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Le blog a été créé avec succès!');
}
}
