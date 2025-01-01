<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;

use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');
Auth::routes();


Route::post('follow/{user}', [FollowsController::class, 'store'])->name('follows.store');
Route::get('/followersCount/{user}', [FollowsController::class, 'index']);

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profiles.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profiles.update');

Route::resource('posts', PostsController::class)->only([
    'create', 'store', 'show', 'index'
]);

Route::get('/home', [PostsController::class, 'index'])->name('home');



