<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Typography\FontFactory;

class CreateSiteController extends Controller
{
    public function index()
    {
        return view('createsite');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_blog' => 'required|string|max:255',
            'sujet_blog' => 'nullable|string|max:255',
            'couleur_blog' => 'required|string|max:255', 
            'couleur_separation_blog' => 'required|string|max:255',
            'taille_separation_blog' => 'required|integer|min:1',
            'image_blog' => 'string|max:255',
            'template_blog' => 'nullable|string|max:255', 
        ]);

        $taille_separation_blog = $request->input('taille_separation_blog') ? $request->input('taille_separation_blog') . 'px' : '10px';

        $imagePath = public_path('image/banniere.png');

        $image = Image::gd()->read($imagePath);

        $textColor = "#ffffff";

        $fontPath = public_path('css/police/OpenSans-VariableFont_wdth,wght.ttf');
        $fontSize = 20;

        $text = 'Votre texte ici';

        $x = 50;
        $y = 50;

        $image->text($text, $x, $y, function(FontFactory $font) use ($fontPath, $fontSize, $textColor) {
            $font->file($fontPath);
            $font->size($fontSize);
            $font->color($textColor);
        });

        

        // Créez un nouveau blog
        $blog = Blog::create([
            'mail_compte' => auth()->user()->mail_compte, // Assurez-vous que l'utilisateur est connecté
            'nom_blog' => $request->input('nom_blog'),
            'sujet_blog' => $request->input('sujet_blog'),
            'couleur_blog' => $request->input('couleur_blog'),
            'couleur_separation_blog' => $request->input('couleur_separation_blog'),
            'taille_separation_blog' => $taille_separation_blog,
            
            'template_blog' => $request->input('template_blog'),
        ]);

        $id_blog = $blog->id_blog;

        $image->save(public_path('uploads/blogs/'.$id_blog.'.png'));

        $blog->update([
            'url_blog' => 'https://' . $request->input('nom_blog') . $id_blog . '.com',
            'image_blog' => 'uploads/blogs/'.$id_blog.'.png',
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Le blog a été créé avec succès!');
    }
}
