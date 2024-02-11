<?php 
namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        // Vous pouvez également passer d'autres données à la vue si nécessaire
        return view('blogs.show', ['blog' => $blog]);
    }
}
