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

        return redirect()->back()->with('success', 'Contenu enregistré avec succès!');
    }
}
