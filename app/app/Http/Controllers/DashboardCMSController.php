<?php 


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assure que l'utilisateur est connecté
    }

    public function index()
    {
        return view('dashboardCMS');
    }
}
