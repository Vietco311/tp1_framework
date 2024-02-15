<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Typography\FontFactory;
  
class ImageController extends Controller
{
    public function addTextToImage()
    {
        // Chemin de l'image de base
        $imagePath = public_path('C:\Users\vieet\OneDrive\Documents\Code M1\Web\tp1_framework\app\public\image\banniere.png');

        // Charger l'image
        $image = Image::gd()->read($imagePath);

        // Couleur du texte (noir)
        $textColor = "#000000"; // RVB

        // Police et taille du texte
        $fontPath = public_path('C:\Users\vieet\OneDrive\Documents\Code M1\Web\tp1_framework\app\public\css\police\OpenSans-VariableFont_wdth,wght.ttf');
        $fontSize = 20;

        // Texte à ajouter
        $text = 'Votre texte ici';

        // Position du texte (ajustez selon vos besoins)
        $x = 50;
        $y = 50;

        // Ajouter le texte à l'image
        $image->text($text, $x, $y, function(FontFactory $font) use ($fontPath, $fontSize, $textColor) {
            $font->file($fontPath);
            $font->size($fontSize);
            $font->color($textColor);
        });

        // Retourner la réponse avec l'image modifiée
        return $image->response('png');
    }
}