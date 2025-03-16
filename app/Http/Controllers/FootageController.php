<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\FootageCreateRequest;
use App\Http\Requests\FootageUpdateRequest;
use App\Http\Resources\FootageResource;
use App\Models\MediaFootage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FootageController extends Controller
{
    public function store(FootageCreateRequest $request)
    {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('footages', 'public');
            $data['photo'] = $path;
        }

        $footage = MediaFootage::create($data);

        return response()->json([
            'media' => new FootageResource($footage),
        ])->setStatusCode(201);
    }

    public function index()
    {
        $footages = MediaFootage::all();

        return response()->json(FootageResource::collection($footages))->setStatusCode(200);
    }

    public function show($footage_id)
    {
        $footage = MediaFootage::where('id', $footage_id)->firstOrFail();

        if (empty($footage)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json([
            'footage' => new FootageResource($footage),
        ])->setStatusCode(200);
    }

    public function update(FootageUpdateRequest $request, $id)
    {
        $footage = MediaFootage::findOrFail($id);
        $data = $request->validated();

        // Обновление photo при необходимости
        if ($request->hasFile('photo')) {
            // Удалим старый файл если он был
            if ($footage->photo && Storage::disk('public')->exists($footage->photo)) {
                Storage::disk('public')->delete($footage->photo);
            }

            $path = $request->file('photo')->store('footages', 'public');
            $data['photo'] = $path;
        }

        $footage->update($data);

        return response()->json([
            'footage' => new FootageResource($footage),
        ])->setStatusCode(200);
    }

    public function destroy($id)
    {
        $footage = MediaFootage::findOrFail($id);

        // Удаляем photo-файл, если есть
        if ($footage->photo && Storage::disk('public')->exists($footage->photo)) {
            Storage::disk('public')->delete($footage->photo);
        }

        $footage->delete();

        return response()->json('Медиа-кадр удалён')->setStatusCode(200, 'Удалено');
    }
}
