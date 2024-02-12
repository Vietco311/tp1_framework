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
        ]);

        // Création du commentaire
        CommentaireBlog::create($validatedData);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }

    // Vous pouvez ajouter d'autres méthodes du contrôleur au besoin
}
