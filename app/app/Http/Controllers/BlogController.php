<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Article;
use App\Models\ImageParam;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Typography\FontFactory;

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
        $commentsApprouve = $blog->comms()->where('etat_commentaire_blog', true)->get();

        return view('blogs.show', ['blog' => $blog, 'couleur' => $couleur, 'articles' => $articles, 'comms' => $comms, 'commentsApprouve' => $commentsApprouve]);
    }


    public function checkPassword(Request $request)
    {
        $password = $request->input('password');
        $blogId = $request->input('blogId');

        $blog = Blog::findOrFail($blogId);

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

        $blog->articles()->with('commentaires')->get()->each(function ($article) {
            $article->commentaires()->delete();
        });
    

        $blog->comms()->delete();

        $blog->articles()->delete();

        $blog->delete();

        return redirect()->route('dashboard')->with('success', 'Le blog a été supprimé avec succès.');
    }


public function edit($id)
{
    $blog = Blog::find($id);

    $paramImageBlog = ImageParam::find($blog->param_image_blog_id);

    return view('blogs.editblog', ['blog' => $blog]);
}

public function update(Request $request, $id)
{
    $blog = Blog::find($id);

    $request->validate([
        'nom_blog' => 'string|max:255',
        'sujet_blog' => 'nullable|string|max:255',
        'couleur_blog' => 'string|max:255', 
        'couleur_separation_blog' => 'string|max:255',
        'taille_separation_blog' => 'integer|min:1',
        'image_blog' => 'integer|min:0|max:2',
        'image_couleur' => 'string|max:255',
        'image_police' => 'string|max:255',
        'template_blog' => 'nullable|string|max:255',
    ]);

    $nom_blog = $request->input('nom_blog');
    
    $taille_separation_blog = $request->input('taille_separation_blog') ? $request->input('taille_separation_blog') . 'em' : '10em';

    $image_blog = $request->input('image_blog');
    $image_couleur = $request->input('image_couleur');
    $image_police = $request->input('image_police');

    if($image_blog !== null || $image_couleur !== null || $image_police !== null){
        if($image_blog == null) {
            $image_blog = $blog->image_blog;
        }
        if($image_couleur == null) {
            $image_couleur = $blog->image_couleur;
        }
        if($image_police == null) {
            $image_police = $blog->image_police;
        }

        $paramImageBlog = ImageParam::find($image_blog);

        $paramImageBlogUrl = $paramImageBlog->param_image_blog_url;
    
        $imagePath = public_path('image/'.$paramImageBlogUrl);
    
        $image = Image::gd()->read($imagePath);
    
        $textColor = $request->input('image_couleur');
    
        $fontPath = public_path('police/'.$image_police.'.ttf');
        $fontSize = 60;
    
        $x = $paramImageBlog->param_image_blog_x;
        $y = $paramImageBlog->param_image_blog_y;
    
        $image->text($nom_blog, $x, $y, function(FontFactory $font) use ($fontPath, $fontSize, $textColor){
            $font->file($fontPath);
            $font->size($fontSize);
            $font->align('center');
            $font->color($textColor);
        }); 
    }

    
    $image->save(public_path('uploads/blogs/'.$id. $request->input('nom_blog').'.png'));

    $blog->update([
        'nom_blog' => $request->input('nom_blog'),
        'couleur_blog' => $request->input('couleur_blog'),
        'couleur_separation_blog' => $request->input('couleur_separation_blog'),
        'taille_separation_blog' => $taille_separation_blog,
        'image_blog' => 'uploads/blogs/'.$id. $request->input('nom_blog'). '.png',
        'param_image_blog_id' => $request->input('image_blog'),
        'couleur_titre_blog' => $request->input('image_couleur'),
        'police_titre_blog' => $request->input('image_police'),
        'sujet_blog' => $request->input('sujet_blog'),
        'template_blog' => $request->input('template_blog'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Paramètres du blog mis à jour avec succès!');
}

public function comms()
    {
        return $this->hasMany(CommentaireBlog::class, 'id_blog');
    }




}
