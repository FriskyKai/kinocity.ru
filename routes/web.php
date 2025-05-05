<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\Web\ActorWebController;
use App\Http\Controllers\Web\DirectorWebController;
use App\Http\Controllers\Web\FootageWebController;
use App\Http\Controllers\Web\GenreWebController;
use App\Http\Controllers\Web\MediaActorWebController;
use App\Http\Controllers\Web\MediaDirectorWebController;
use App\Http\Controllers\Web\MediaGenreWebController;
use App\Http\Controllers\Web\MediaWebController;
use App\Http\Controllers\Web\ReviewWebController;
use App\Http\Controllers\Web\StudioWebController;
use App\Http\Controllers\Web\UserWebController;
use App\Models\Media;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $mediaCatalog = Media::all();

    return view('media.index', compact('mediaCatalog'));
});

// Маршруты для Пользователей
Route::get('/users', [UserWebController::class, 'index'])->name('users.index');
Route::get('/users/show/{user}', [UserWebController::class, 'show'])->name('users.show');
Route::get('/users/create', [UserWebController::class, 'create'])->name('users.create');
Route::post('/users/create', [UserWebController::class, 'store'])->name('users.store');
Route::get('/users/edit/{user}', [UserWebController::class, 'edit'])->name('users.edit');
Route::post('/users/edit/{user}', [UserWebController::class, 'update'])->name('users.update');
Route::get('/users/delete/{user}', [UserWebController::class, 'destroy'])->name('users.destroy');

// Маршруты для Студий
Route::get('/studios', [StudioWebController::class, 'index'])->name('studios.index');
Route::get('/studios/show/{studio}', [StudioWebController::class, 'show'])->name('studio.show');
Route::get('/studios/create', [StudioWebController::class, 'create'])->name('studios.create');
Route::post('/studios/create', [StudioWebController::class, 'store'])->name('studios.store');
Route::get('/studios/edit/{studio}', [StudioWebController::class, 'edit'])->name('studios.edit');
Route::post('/studios/edit/{studio}', [StudioWebController::class, 'update'])->name('studios.update');
Route::get('/studios/delete/{studio}', [StudioWebController::class, 'destroy'])->name('studios.destroy');

// Маршруты для Жанров
Route::get('/genres', [GenreWebController::class, 'index'])->name('genres.index');
Route::get('/genres/show/{genre}', [GenreWebController::class, 'show'])->name('genres.show');
Route::get('/genres/create', [GenreWebController::class, 'create'])->name('genres.create');
Route::post('/genres/create', [GenreWebController::class, 'store'])->name('genres.store');
Route::get('/genres/edit/{genre}', [GenreWebController::class, 'edit'])->name('genres.edit');
Route::post('/genres/edit/{genre}', [GenreWebController::class, 'update'])->name('genres.update');
Route::get('/genres/delete/{genre}', [GenreWebController::class, 'destroy'])->name('genres.destroy');

// Маршруты для Режиссёров
Route::get('/directors', [DirectorWebController::class, 'index'])->name('directors.index');
Route::get('/directors/show/{director}', [DirectorWebController::class, 'show'])->name('directors.show');
Route::get('/directors/create', [DirectorWebController::class, 'create'])->name('directors.create');
Route::post('/directors/create', [DirectorWebController::class, 'store'])->name('directors.store');
Route::get('/directors/edit/{director}', [DirectorWebController::class, 'edit'])->name('directors.edit');
Route::post('/directors/edit/{director}', [DirectorWebController::class, 'update'])->name('directors.update');
Route::get('/directors/delete/{director}', [DirectorWebController::class, 'destroy'])->name('directors.destroy');

// Маршруты для Актёров
Route::get('/actors', [ActorWebController::class, 'index'])->name('actors.index');
Route::get('/actors/show/{actor}', [ActorWebController::class, 'show'])->name('actors.show');
Route::get('/actors/create', [ActorWebController::class, 'create'])->name('actors.create');
Route::post('/actors/create', [ActorWebController::class, 'store'])->name('actors.store');
Route::get('/actors/edit/{actor}', [ActorWebController::class, 'edit'])->name('actors.edit');
Route::post('/actors/edit/{actor}', [ActorWebController::class, 'update'])->name('actors.update');
Route::get('/actors/delete/{actor}', [ActorWebController::class, 'destroy'])->name('actors.destroy');

// Маршруты для Медиа-каталога
Route::get('/media', [MediaWebController::class, 'index'])->name('media.index');
Route::get('/media/show/{media}', [MediaWebController::class, 'show'])->name('media.show');
Route::get('/media/create', [MediaWebController::class, 'create'])->name('media.create');
Route::post('/media/create', [MediaWebController::class, 'store'])->name('media.store');
Route::get('/media/edit/{media}', [MediaWebController::class, 'edit'])->name('media.edit');
Route::post('/media/edit/{media}', [MediaWebController::class, 'update'])->name('media.update');
Route::get('/media/delete/{media}', [MediaWebController::class, 'destroy'])->name('media.destroy');

// Маршруты для Медиа-связей
// Медиа-жанры
Route::get('/media-genres/create', [MediaGenreWebController::class, 'create'])->name('media-genres.create');
Route::post('/media-genres/create', [MediaGenreWebController::class, 'store'])->name('media-genres.store');
Route::get('/media-genres/delete/{id}', [MediaGenreWebController::class, 'destroy'])->name('media-genres.destroy');
// Медиа-режиссёры
Route::get('/media-directors/create', [MediaDirectorWebController::class, 'create'])->name('media-directors.create');
Route::post('/media-directors/create', [MediaDirectorWebController::class, 'store'])->name('media-directors.store');
Route::get('/media-directors/delete/{id}', [MediaDirectorWebController::class, 'destroy'])->name('media-directors.destroy');
// Медиа-актёры
Route::get('/media-actors/create', [MediaActorWebController::class, 'create'])->name('media-actors.create');
Route::post('/media-actors/create', [MediaActorWebController::class, 'store'])->name('media-actors.store');
Route::get('/media-actors/delete/{id}', [MediaActorWebController::class, 'destroy'])->name('media-actors.destroy');

// Маршруты для Медиа-кадров
Route::get('/footages/show/{id}', [FootageWebController::class, 'show'])->name('footages.show');
Route::get('/footages/create', [FootageWebController::class, 'create'])->name('footages.create');
Route::post('/footages/create', [FootageWebController::class, 'store'])->name('footages.store');
Route::get('/footages/edit/{id}', [FootageWebController::class, 'edit'])->name('footages.edit');
Route::post('/footages/edit/{id}', [FootageWebController::class, 'update'])->name('footages.update');
Route::get('/footages/delete/{id}', [FootageWebController::class, 'destroy'])->name('footages.destroy');

// Маршруты для Медиа-кадров
Route::get('/reviews/delete/{id}', [ReviewWebController::class, 'destroy'])->name('reviews.destroy');
