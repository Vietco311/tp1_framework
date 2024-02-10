<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\DashboardCMSController;


// Route pour le tableau de bord (dashboard)
Route::get('/dashboard', [DashboardCMSController::class, 'index'])->name('dashboard');



// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes d'inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/phpinfo', function () {
    return view('phpinfo');
});

Route::get('/', function () {
    return view('acceuil');
});

Route::get('/burger', function () {
    return view('burger');
});

Route::get('/horizontal', function () {
    return view('horizontal');
});

Route::get('/vert-gauche', function () {
    return view('vertgauche');
});

Route::get('/page-example', function () {
    return view('pageexample');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/save-content', [App\Http\Controllers\AcceuilController::class, 'saveContent'])->name('saveContent');
