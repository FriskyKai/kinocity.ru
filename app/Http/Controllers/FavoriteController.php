<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\FavoriteCreateRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(FavoriteCreateRequest $request)
    {
        // Проверяем, не добавлял ли пользователь это уже в избранное
        $exists = Favorite::where('user_id', auth()->id())
            ->where('media_id', $request->media_id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Уже добавлено в избранное.'], 200);
        }

        $favorite = Favorite::create([
            'user_id' => auth()->id(),
            'media_id' => $request->media_id,
            'date' => now()->toDateString(), // текущее время
        ]);

        return response()->json(new FavoriteResource($favorite), 201);
    }

    public function index()
    {
        $user = auth()->user(); // получаем текущего пользователя
        $favorites = Favorite::where('user_id', $user->id)->get(); // фильтрация по user_id

        if (empty($favorites)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json(FavoriteResource::collection($favorites))->setStatusCode(200);
    }

    public function show($media_id)
    {
        $favorite = Favorite::where('user_id', auth()->id())->where('media_id', $media_id)->first();

        if (empty($favorite)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json(new FavoriteResource($favorite))->setStatusCode(200);
    }

    public function destroy($favorite_id)
    {
        $favorite = Favorite::find($favorite_id);

        if (empty($favorite)) {
            throw new ApiException('Not Found', 404);
        }

        Favorite::destroy($favorite_id);

        return response()->json('Избранное удалено')->setStatusCode(200, 'Удалено');
    }

    public function isFavorite($media_id)
    {
        // Проверяем, добавлял ли пользователь это уже в избранное
        $exists = Favorite::where('user_id', auth()->id())
            ->where('media_id', $media_id)
            ->exists();

        if ($exists) {
            return 1;
        }

        return 0;
    }
}
