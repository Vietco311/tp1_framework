<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class YourController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function saveContent(Request $request)
    {
        $content = $request->input('content');

        // Effectue ici le traitement pour sauvegarder le contenu dans ta base de données ou ailleurs

        return redirect()->back()->with('success', 'Contenu enregistré avec succès!');
    }
}
