<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Http\Resources\BiographyResource;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    public function store(BiographyCreateRequest $request)
    {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $actor = Actor::create($data);

        return response()->json([
            'actor' => new BiographyResource($actor),
        ])->setStatusCode(201);
    }

    public function index()
    {
        $actors = Actor::all();

        return response()->json(BiographyResource::collection($actors))->setStatusCode(200);
    }

    public function show($actor_id)
    {
        $actor = Actor::where('id', $actor_id)->firstOrFail();

        if (empty($actor)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json([
            'actor' => new BiographyResource($actor),
        ])->setStatusCode(200);
    }

    public function update(BiographyUpdateRequest $request, $id)
    {
        $actor = Actor::findOrFail($id);
        $data = $request->validated();

        // Обновление photo при необходимости
        if ($request->hasFile('photo')) {
            // Удалим старый файл если он был
            if ($actor->photo && Storage::disk('public')->exists($actor->photo)) {
                Storage::disk('public')->delete($actor->photo);
            }

            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $actor->update($data);

        return response()->json([
            'actor' => new BiographyResource($actor),
        ])->setStatusCode(200);
    }

    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);

        // Удаляем photo-файл, если есть
        if ($actor->photo && Storage::disk('public')->exists($actor->photo)) {
            Storage::disk('public')->delete($actor->photo);
        }

        $actor->delete();

        return response()->json('Актёр удалён')->setStatusCode(200, 'Удалено');
    }
}
