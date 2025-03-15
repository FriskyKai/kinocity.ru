<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FootageController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Маршруты для Регистрации, Авторизации и Выхода
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Маршруты для Пользователей
Route::middleware(['auth:api', CheckRole::class . ':admin'])->apiResource('users', UserController::class);

// Маршруты для Профиля
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::post('/profile', [ProfileController::class, 'update']);
});

// Маршруты для Студий
Route::middleware(['auth:api', CheckRole::class . ':admin'])->apiResource('studios', StudioController::class)->except('index', 'show');
Route::get('/studios', [StudioController::class, 'index']);
Route::get('/studios/{id}', [StudioController::class, 'show']);

// Маршруты для Жанров
Route::middleware(['auth:api', CheckRole::class . ':admin'])->apiResource('genres', GenreController::class)->except('index', 'show');
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);

// Маршруты для Актёров
Route::middleware(['auth:api', CheckRole::class . ':admin'])->apiResource('actors', ActorController::class)->except('index', 'show');
Route::get('/actors', [ActorController::class, 'index']);
Route::get('/actors/{id}', [ActorController::class, 'show']);

// Маршруты для Режиссёров
Route::middleware(['auth:api', CheckRole::class . ':admin'])->apiResource('directors', DirectorController::class)->except('index', 'show');
Route::get('/directors', [DirectorController::class, 'index']);
Route::get('/directors/{id}', [DirectorController::class, 'show']);

// Маршруты для Медиа-каталога
Route::middleware(['auth:api', CheckRole::class . ':admin'])->apiResource('media', MediaController::class)->except('index', 'show');
Route::get('/media', [MediaController::class, 'index']);
Route::get('/media/{id}', [MediaController::class, 'show']);
// Route::get('') || просмотр медиа

// Маршруты для Медиа-кадра
Route::middleware(['auth:api', CheckRole::class . ':admin'])->apiResource('media_footages', FootageController::class)->except('index', 'show');
Route::get('/footages', [FootageController::class, 'index']);
Route::get('/footages/{id}', [FootageController::class, 'show']);

// Маршруты для Рецензий
Route::middleware('auth:api')->apiResource('reviews', ReviewController::class)->except('index', 'show');
Route::get('/reviews', [ReviewController::class, 'index']);

// Маршруты для Избранных
Route::middleware('auth:api')->apiResource('favorites', FavoriteController::class)->except('show', 'update');



