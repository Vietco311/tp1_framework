<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/save-content', [App\Http\Controllers\AcceuilController::class, 'saveContent'])->name('saveContent');
