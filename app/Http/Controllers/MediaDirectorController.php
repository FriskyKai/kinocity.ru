<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\MediaDirectorCreateRequest;
use App\Models\MediaDirector;
use Illuminate\Http\Request;

class MediaDirectorController extends Controller
{
    public function store(MediaDirectorCreateRequest $request)
    {
        // Проверяем, существует ли уже такая связь
        $exists = MediaDirector::where('media_id', $request->media_id)
            ->where('director_id', $request->director_id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Связь между медиа и режиссёром уже существует.'], 200);
        }

        // Создаем новую связь
        $mediaDirector = MediaDirector::create([
            'media_id' => $request->media_id,
            'director_id' => $request->director_id,
        ]);

        return response()->json($mediaDirector)->setStatusCode(201);
    }

    public function destroy($mediaDirectorId)
    {
        $mediaDirector = MediaDirector::find($mediaDirectorId);

        if (empty($mediaDirector)) {
            throw new ApiException('Связь не найдена.', 404);
        }

        $mediaDirector->delete();

        return response()->json(['message' => 'Связь удалена.'])->setStatusCode(200);
    }
}
