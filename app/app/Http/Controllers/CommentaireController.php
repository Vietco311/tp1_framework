<?php 
namespace App\Http\Controllers;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        Commentaire::create([
            'id_article' => $request->id_article,
            'pseudo_commentaire' => $request->pseudo_commentaire,
            'contenu_commentaire' => $request->contenu_commentaire,
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès!');
    }

    public function moderateComments($articleId)
    {
        $article = Article::find($articleId);

        if (!$article) {
            abort(404); // Gérer le cas où l'article n'est pas trouvé
        }

        $comments = $article->commentaires()->get();
        
        $commentsApprouve = $article->commentaires()->where('etat_commentaire', true)->get();

        $commentsNonApprouve = $article->commentaires()->where('etat_commentaire', false)->get();

        return view('blogs.moderatecomments', ['article' => $article, 'comments' => $comments , 'commentsApprouve' => $commentsApprouve, 'commentsNonApprouve' => $commentsNonApprouve]);
    }

    public function approveComment($commentId)
    {
        $comment = Commentaire::find($commentId);

        if (!$comment) {
            abort(404); // Gérer le cas où le commentaire n'est pas trouvé
        }

        $comment->update(['etat_commentaire' => true]);

        return back()->with('success', 'Commentaire approuvé avec succès!');
    }

    public function disapproveComment($commentId)
    {
        $comment = Commentaire::find($commentId);
    
        if (!$comment) {
            abort(404); // Gérer le cas où le commentaire n'est pas trouvé
        }
    
        $comment->update(['etat_commentaire' => false]);
    
        return back()->with('success', 'Commentaire désapprouvé avec succès!');
    }
    

}
