<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\MediaGenreCreateRequest;
use App\Http\Resources\MediaGenreResource;
use App\Models\MediaGenre;
use Illuminate\Http\Request;

class MediaGenreController extends Controller
{
    public function store(MediaGenreCreateRequest $request)
    {
        // Проверяем, существует ли уже такая связь
        $exists = MediaGenre::where('media_id', $request->media_id)
            ->where('genre_id', $request->genre_id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Связь между медиа и жанром уже существует.'], 200);
        }

        // Создаем новую связь
        $mediaGenre = MediaGenre::create([
            'media_id' => $request->media_id,
            'genre_id' => $request->genre_id,
        ]);

        return response()->json(new MediaGenreResource($mediaGenre))->setStatusCode(201);
    }

    public function destroy($mediaGenreId)
    {
        $mediaGenre = MediaGenre::find($mediaGenreId);

        if (empty($mediaGenre)) {
            throw new ApiException('Связь не найдена.', 404);
        }

        $mediaGenre->delete();

        return response()->json(['message' => 'Связь удалена.'])->setStatusCode(200);
    }
}
