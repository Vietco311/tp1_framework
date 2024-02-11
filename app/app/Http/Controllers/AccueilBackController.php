<?php 


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilBackController extends Controller
{
    public function index()
    {
        return view('accueilback');
    }
}
