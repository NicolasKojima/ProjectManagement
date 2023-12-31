<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactformController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\IndivController;
use App\Http\Controllers\formController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\CustomAuthController;

Route::get('/contact-form', [ContactformController::class, 'index']);

Route::get('/about-us', [AboutusController::class, 'index']);

Route::get('post-project', [FormController::class, 'index']);
Route::post('store-form', [FormController::class, 'store']);

Route::get('registration', [IndivController::class, 'index']);
Route::post('store-form1', [IndivController::class, 'store']);

Route::get('/', function () {
    return view('homepage');
});

Route::get('/homepage', [FormController::class, 'index1'])->name('homepage');

Route::get('/forms/edit/{id}', [DatabaseController::class, 'edit']);
Route::post('/forms/update/{id}', [DatabaseController::class, 'update']);
Route::get('/forms/edit/{id}', [DatabaseController::class, 'edit'])->name('edit');
Route::post('/forms/update/{id}', [DatabaseController::class, 'update'])->name('update');

Route::post('/forms/{id}', [FormController::class, 'delete'])->name('delete');
Route::post('/indiv/{id}', [IndivController::class, 'delete'])->name('delete');


Route::get('/', function () {
    return view('welcome');
});

