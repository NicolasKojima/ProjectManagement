<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactformController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\IndivController;
use App\Http\Controllers\FormController;

// Route::get('/homepage', [PostController::class, 'index']);

// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/homepage', [FormController::class, 'index1']);

Route::get('/', function () {
    return view('homepage');
});

Route::get('/contact-form', [ContactformController::class, 'index']);


Route::get('/about-us', [AboutusController::class, 'index']);


Route::get('post-project', [FormController::class, 'index']);
Route::post('store-form', [FormController::class, 'store']);

Route::get('registration', [IndivController::class, 'index']);
Route::post('store-form1', [IndivController::class, 'store']);

Route::get('/homepage', [FormController::class, 'index1'])->name('homepage');
