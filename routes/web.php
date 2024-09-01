<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DogEarController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;

// Route::get('/register', [RegisterController::class, 'create'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/logout', [Logoutcontroller::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/collections', [CollectionController::class, 'index'])->name('collections');
Route::get('/collections/new', [CollectionController::class, 'create'])->middleware('auth')->name('collections.create');
Route::get('/collections/{id}', [CollectionController::class, 'show'])->name('collections.show');
Route::post('/collections', [CollectionController::class, 'store'])->middleware('auth')->name('collections.store');

Route::get('/user/{id}', [DogEarController::class, 'user'])->name('users.show');

Route::get('/tags', [TagController::class, 'index'])->name('tags');
Route::get('/tags/{slug}', [TagController::class, 'show'])->name('tags.show');

Route::get('/', [DogEarController::class, 'index'])->name('dogears');
Route::post('/links', [DogEarController::class, 'store'])->middleware('auth')->name('dogears.store');
Route::get('/new', [DogEarController::class, 'create'])->middleware('auth')->name('dogears.create');
Route::get('/links/{id}', [DogEarController::class, 'show'])->name('dogears.show');
Route::get('/edit/{id}', [DogEarController::class, 'edit'])->middleware('auth')->name('dogears.edit');
Route::post('/edit/{id}', [DogEarController::class, 'update'])->middleware('auth')->name('dogears.update');


Route::post('/', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::get('/delete/{id}', [DogEarController::class, 'destroy'])->middleware('auth')->name('dogears.destroy');

Route::get('/search', [SearchController::class, 'show'])->name('search.show');
