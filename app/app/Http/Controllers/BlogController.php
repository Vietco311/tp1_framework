<?php 
namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show($id)
{
    $blog = Blog::findOrFail($id);
    $couleur = $blog->couleur_blog;
    return view('blogs.show', ['blog' => $blog, 'couleur' => $couleur]);
}

}
