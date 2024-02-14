<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Article;

class BlogController extends Controller
{
    

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_blog');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $couleur = $blog->couleur_blog;
        $articles = $blog->articles()->get();
        $comms = $blog->comms()->get();
        return view('blogs.show', ['blog' => $blog, 'couleur' => $couleur, 'articles' => $articles, 'comms' => $comms]);
    }


    public function checkPassword(Request $request)
    {
        $password = $request->input('password');
        $blogId = $request->input('blogId');

        // Récupérer le blog correspondant à l'ID
        $blog = Blog::findOrFail($blogId);

        // Vérifier si le mot de passe correspond
        if (Hash::check($password, $blog->user->password)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        if (!$blog) {
            return redirect()->route('dashboard')->with('error', 'Le blog n\'existe pas.');
        }

        $blog->articles()->delete();

        $blog->delete();

        return redirect()->route('dashboard')->with('success', 'Le blog a été supprimé avec succès.');
    }

    // Dans votre contrôleur, par exemple BlogController.php

public function edit($id)
{
    $blog = Blog::find($id);

    return view('blogs.editblog', ['blog' => $blog]);
}

public function update(Request $request, $id)
{
    $blog = Blog::find($id);

    $request->validate([
        'nom_blog' => 'required|string|max:255',
        'couleur_blog' => 'required|string|max:255',
        'couleur_separation_blog' => 'required|string|max:255',
        'taille_separation_blog' => 'string|max:255', 
        'image_blog' => 'required|string|max:255',
        'template_blog' => 'required|string|max:255',
    ]);

    // Use the null coalescing operator to handle the 'px' concatenation
    $taille_separation_blog = $request->input('taille_separation_blog') ? $request->input('taille_separation_blog') . 'px' : '10px';

    $blog->update([
        'nom_blog' => $request->input('nom_blog'),
        'couleur_blog' => $request->input('couleur_blog'),
        'couleur_separation_blog' => $request->input('couleur_separation_blog'),
        'taille_separation_blog' => $taille_separation_blog,
        'image_blog' => $request->input('image_blog'),
        'template_blog' => $request->input('template_blog'),
        // Add other fields as needed
    ]);

    return redirect()->route('dashboard')->with('success', 'Paramètres du blog mis à jour avec succès!');
}



}
