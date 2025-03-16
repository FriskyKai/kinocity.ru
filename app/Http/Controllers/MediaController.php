<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaCreateRequest;
use App\Http\Requests\MediaUpdateRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function store(MediaCreateRequest $request)
    {
        $data = $request->validated();

        // Обработка preview-файла
        if ($request->hasFile('preview')) {
            $path = $request->file('preview')->store('previews', 'public');
            $data['preview'] = $path;
        }

        $media = Media::create($data);

        return response()->json([
            'media' => new MediaResource($media),
        ])->setStatusCode(201);
    }

    public function index()
    {
        $media = Media::with(['studio', 'ageRating', 'mediaGenres.genre'])->get();

        return response()->json(MediaResource::collection($media))->setStatusCode(200);
    }

    public function show($id)
    {
        $media = Media::with(['studio', 'ageRating', 'mediaGenres.genre'])->findOrFail($id);

        return response()->json([
            'media' => new MediaResource($media),
        ])->setStatusCode(200);
    }

    public function update(MediaUpdateRequest $request, $id)
    {
        $media = Media::findOrFail($id);
        $data = $request->validated();

        // Обновление preview при необходимости
        if ($request->hasFile('preview')) {
            // Удалим старый файл если он был
            if ($media->preview && Storage::disk('public')->exists($media->preview)) {
                Storage::disk('public')->delete($media->preview);
            }

            $path = $request->file('preview')->store('previews', 'public');
            $data['preview'] = $path;
        }

        $media->update($data);

        return response()->json([
            'media' => new MediaResource($media),
        ])->setStatusCode(200);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Удаляем preview-файл, если есть
        if ($media->preview && Storage::disk('public')->exists($media->preview)) {
            Storage::disk('public')->delete($media->preview);
        }

        $media->delete();

        return response()->json('Медиа удалено')->setStatusCode(200, 'Удалено');
    }
}
