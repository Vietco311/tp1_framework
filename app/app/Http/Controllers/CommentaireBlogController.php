<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentaireBlog;
use App\Models\Blog;

class CommentaireBlogController extends Controller
{
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $comms = CommentaireBlog::where('id_blog', $id)->get();

        return view('blogs.show', ['blog' => $blog, 'comms' => $comms]);
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'id_blog' => 'required|exists:blogs,id_blog',
            'pseudo_commentaire_blog' => 'required|string|max:255',
            'contenu_commentaire_blog' => 'required|string',
            // Vous pouvez ajouter d'autres règles de validation au besoin
        ]);

        // Création du commentaire
        CommentaireBlog::create($validatedData);

        // Redirection ou autre logique après l'ajout du commentaire
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }

    // Vous pouvez ajouter d'autres méthodes du contrôleur au besoin
}
