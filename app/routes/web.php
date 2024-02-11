<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccueilBackController;
use App\Http\Controllers\DashboardCMSController;
use App\Http\Controllers\CreateSiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;


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

Route::get('Article/{articleId}', [ArticleController::class, 'show'])->name('view-article');

Route::get('/moderate-comments/{idArticle}', [CommentaireController::class, 'moderateComments'])->name('moderate-comments');

Route::post('/approve-comment/{id}', [CommentaireController::class, 'approveComment'])->name('approve-comment');

Route::post('/disapprove-comment/{id}', [CommentaireController::class, 'disapproveComment'])->name('disapprove-comment');


Route::middleware(['web'])->group(function () {
    // Vos autres routes ici

    Route::delete('/delete-article/{id}', [ArticleController::class, 'destroy'])->name('delete-article');

    Route::post('/check-password', [BlogController::class, 'checkPassword'])->name('check-password');

    // Route pour la suppression du blog
    Route::delete('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete-blog');
});

Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit-blog');


Route::get('/create-article/{blog}', [ArticleController::class, 'create'])->name('create-article');


Route::post('/store-article/{blog}', [ArticleController::class, 'store'])->name('store-article');

Route::post('/comment/store', [CommentaireController::class, 'store'])->name('comment.store');

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
