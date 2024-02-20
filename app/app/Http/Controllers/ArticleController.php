<?php 
namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Article;

class ArticleController extends Controller
{

    public function create($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        return view('blogs.createarticle', ['blog' => $blog]);
    }

    public function store(Request $request, $blogId)
    {
        $request->validate([
            'nom_article' => 'required|string|max:255',
            'contenu_article' => 'required|string',
            'image_article' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'auteur_article' => 'required|string|max:255', 
        ]);

        $imagePath = $request->file('image_article')->store('article_images', 'public');

        $article = new Article([
            'id_blog' => $blogId,
            'nom_article' => $request->input('nom_article'),
            'auteur_article' => $request->input('auteur_article'),
            'contenu_article' => $request->input('contenu_article'),
            'image_article' => $imagePath, 
        ]);

        $article->save();

        return redirect()->route('view-blog', ['id' => $blogId])->with('success', 'Article créé avec succès.');
    }

    public function destroy($articleId)
    {

        $articleId = Article::findOrFail($articleId);

        if (!$articleId) {
            return redirect()->route('dashboard')->with('error', 'L\'article n\'existe pas.');
        }

        $articleId->delete();

        return redirect()->route('dashboard')->with('success', 'L\'article a été supprimé avec succès.');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'id_blog');
    }

    public function show($articleId)
    {
        $article = Article::findOrFail($articleId);
        $commentsApprouve = $article->commentaires()->where('etat_commentaire', true)->get();
        return view('blogs.showarticle', ['article' => $article, 'blog'=> $article->blog, 'articles' => $article->blog->articles, 'commentsApprouve' => $commentsApprouve]);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_article');
    }



}  