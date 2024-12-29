<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilesController;

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [ProfilesController::class, 'index'])->name('home');
Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');


//Auth::routes();
//
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//
//Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
