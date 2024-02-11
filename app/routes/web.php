<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccueilBackController;
use App\Http\Controllers\DashboardCMSController;
use App\Http\Controllers\CreateSiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;


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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardCMSController::class, 'index']);
});

Route::get('/create-site', [CreateSiteController::class, 'index'])->name('create-site');
Route::post('/store-site', [CreateSiteController::class, 'store'])->name('store-site');

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('view-blog');


Route::get('/create-article/{blog}', [ArticleController::class, 'create'])->name('create-article');


Route::post('/store-article/{blog}', [ArticleController::class, 'store'])->name('store-article');



Route::get('/dashboard', [DashboardCMSController::class, 'index'])->name('dashboard');


Route::get('/', [AccueilBackController::class, 'index'])->name('welcome');


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

Route::get('/acceuil', function () {
    return view('acceuil');
});

Route::get('/burger', function () {
    return view('templates/burger');
});

Route::get('/horizontal', function () {
    return view('templates/horizontal');
});

Route::get('/verticale', function () {
    return view('templates/verticale');
});

Route::get('/page-example', function () {
    return view('pageexample');
});

Route::get('/ecrire-page', function () {
    return view('writingpage');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/save-content', [App\Http\Controllers\AcceuilController::class, 'saveContent'])->name('saveContent');
