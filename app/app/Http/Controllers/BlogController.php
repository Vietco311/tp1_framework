<?php 
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Article;

class BlogController extends Controller
{
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $couleur = $blog->couleur_blog;
        return view('blogs.show', ['blog' => $blog, 'couleur' => $couleur]);
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_blog');
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

}
