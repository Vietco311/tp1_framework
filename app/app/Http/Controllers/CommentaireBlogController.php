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
        $validatedData = $request->validate([
            'id_blog' => 'required|exists:blog,id_blog',
            'pseudo_commentaire_blog' => 'required|string|max:255',
            'contenu_commentaire_blog' => 'required|string',
        ]);

        CommentaireBlog::create($validatedData);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }

    public function moderateComments($idBlog)
    {
        $blog = Blog::findOrFail($idBlog);
        $comms = CommentaireBlog::where('id_blog', $idBlog)->get();

        $commsApprouve = CommentaireBlog::where('id_blog', $idBlog)->where('etat_commentaire_blog', true)->get();
        $commsNonApprouve = CommentaireBlog::where('id_blog', $idBlog)->where('etat_commentaire_blog', false)->get();


        return view('blogs.moderatecommentsblog', ['blog' => $blog, 'comments' => $comms, 'commentsApprouve' => $commsApprouve, 'commentsNonApprouve' => $commsNonApprouve]);
    }

    public function approveComment($id)
    {
        $comment = CommentaireBlog::findOrFail($id);
        $comment->etat_commentaire_blog = true;
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire approuvé avec succès');
    }

    public function disapproveComment($id)
    {
        $comment = CommentaireBlog::findOrFail($id);
        $comment->etat_commentaire_blog = false;
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire désapprouvé avec succès');
    }

}
