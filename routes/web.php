<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [ProfilesController::class, 'index'])->name('home');

//Route::get('/p/create', [PostsController::class, 'create'])->name('posts.create');
//Route::post('/p', [PostsController::class, 'store'])->name('posts.store');
//Route::get('/p/{post}', [PostsController::class, 'show'])->name('posts.show');
//

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'store'])->name('profile.update');

//Route::controller(ProfilesController::class)->group(function () {
//    Route::get('/p/create', 'create')->name('posts.create');
//    Route::get('/profile/{user}', 'index')->name('profile.index');
//});

//
//Route::controller(PostsController::class)->group(function () {
//    Route::get('/p/create', 'create')->name('posts.create');
//    Route::get('/p/{post}', 'show')->name('posts.show');
//    Route::post('/p', 'store')->name('posts.store');
//});


Route::resource('posts', PostsController::class)->only([
    'create', 'store', 'show'
]);

//Auth::routes();
//
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//
//Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
