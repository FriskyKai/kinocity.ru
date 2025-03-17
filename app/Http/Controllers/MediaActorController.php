<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\MediaActorCreateRequest;
use App\Http\Resources\MediaActorResource;
use App\Models\MediaActor;
use Illuminate\Http\Request;

class MediaActorController extends Controller
{
    public function store(MediaActorCreateRequest $request)
    {
        // Проверяем, существует ли уже такая связь
        $exists = MediaActor::where('media_id', $request->media_id)
            ->where('actor_id', $request->actor_id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Связь между медиа и актёром уже существует.'], 200);
        }

        // Создаем новую связь
        $mediaActor = MediaActor::create([
            'media_id' => $request->media_id,
            'actor_id' => $request->actor_id,
        ]);

        return response()->json(new MediaActorResource($mediaActor))->setStatusCode(201);
    }

    public function destroy($mediaActorId)
    {
        $mediaActor = MediaActor::find($mediaActorId);

        if (empty($mediaActor)) {
            throw new ApiException('Связь не найдена.', 404);
        }

        $mediaActor->delete();

        return response()->json(['message' => 'Связь удалена.'])->setStatusCode(200);
    }
}
