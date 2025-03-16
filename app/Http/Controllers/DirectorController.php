<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Http\Resources\BiographyResource;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
    public function store(BiographyCreateRequest $request)
    {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $director = Director::create($data);

        return response()->json([
            'director' => new BiographyResource($director),
        ])->setStatusCode(201);
    }

    public function index()
    {
        $directors = Director::all();

        return response()->json(BiographyResource::collection($directors))->setStatusCode(200);
    }

    public function show($director_id)
    {
        $director = Director::where('id', $director_id)->firstOrFail();

        if (empty($director)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json([
            'director' => new BiographyResource($director),
        ])->setStatusCode(200);
    }

    public function update(BiographyUpdateRequest $request, $id)
    {
        $director = Director::findOrFail($id);
        $data = $request->validated();

        // Обновление photo при необходимости
        if ($request->hasFile('photo')) {
            // Удалим старый файл если он был
            if ($director->photo && Storage::disk('public')->exists($director->photo)) {
                Storage::disk('public')->delete($director->photo);
            }

            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $director->update($data);

        return response()->json([
            'director' => new BiographyResource($director),
        ])->setStatusCode(200);
    }

    public function destroy($id)
    {
        $director = Director::findOrFail($id);

        // Удаляем photo-файл, если есть
        if ($director->photo && Storage::disk('public')->exists($director->photo)) {
            Storage::disk('public')->delete($director->photo);
        }

        $director->delete();

        return response()->json('Режиссёр удалён')->setStatusCode(200, 'Удалено');
    }
}
