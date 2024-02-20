<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccueilBackController;
use App\Http\Controllers\DashboardCMSController;
use App\Http\Controllers\CreateSiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CommentaireBlogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImagePreviewController;


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

    Route::get('/dashboard', [DashboardCMSController::class, 'index'])->name('dashboard');

    Route::get('/create-site', [CreateSiteController::class, 'index'])->name('create-site');

    Route::post('/store-site', [CreateSiteController::class, 'store'])->name('store-site');

    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('view-blog');

    Route::get('Article/{articleId}', [ArticleController::class, 'show'])->name('view-article');

    Route::get('/moderate-comments/{idArticle}', [CommentaireController::class, 'moderateComments'])->name('moderate-comments');

    Route::post('/approve-comment/{id}', [CommentaireController::class, 'approveComment'])->name('approve-comment');

    Route::post('/disapprove-comment/{id}', [CommentaireController::class, 'disapproveComment'])->name('disapprove-comment');

    Route::post('/approve-comment-blog/{id}', [CommentaireBlogController::class, 'approveComment'])->name('approve-comment-blog');

    Route::post('/disapprove-comment-blog/{id}', [CommentaireBlogController::class, 'disapproveComment'])->name('disapprove-comment-blog');

    Route::delete('/delete-article/{id}', [ArticleController::class, 'destroy'])->name('delete-article');

    Route::post('/check-password', [BlogController::class, 'checkPassword'])->name('check-password');

    Route::delete('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete-blog');

    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit-blog');

    Route::get('/create-article/{blog}', [ArticleController::class, 'create'])->name('create-article');

    Route::post('/store-article/{blog}', [ArticleController::class, 'store'])->name('store-article');

    Route::post('/comment/store', [CommentaireController::class, 'store'])->name('comment-store');

    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');

    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');

    Route::post('/commentBlog/store', [CommentaireBlogController::class, 'store'])->name('commentBlog.store');

    Route::get('/moderate-comments-blog/{idBlog}', [CommentaireBlogController::class, 'moderateComments'])->name('moderate-comments-blog');

    Route::post('/generate-image-preview', 'CreateSiteController@generateImagePreview')->name('generate-image-preview');

    Route::post('/save-content', [App\Http\Controllers\AcceuilController::class, 'saveContent'])->name('saveContent');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    });





Route::get('/', [AccueilBackController::class, 'index'])->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [AuthController::class, 'register']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


