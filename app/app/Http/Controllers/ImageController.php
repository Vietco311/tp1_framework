<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Typography\FontFactory;
  
class ImageController extends Controller
{
    public function addTextToImage()
    {
        try {
            $imagePath = public_path('image/banniere.png');

            // Charger l'image
            $image = Image::gd()->read($imagePath);

            // Couleur du texte (noir)
            $textColor = "#000000"; // RVB

            // Police et taille du texte
            $fontPath = public_path('css/police/OpenSans-VariableFont_wdth,wght.ttf');
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
            return response($image->encode('png'))->header('Content-Type', 'image/png');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Une erreur s\'est produite'], 500);
            // Vous pouvez également retourner une réponse personnalisée ici si nécessaire.
        }
}
}