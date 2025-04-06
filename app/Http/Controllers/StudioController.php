<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\StudioCreateRequest;
use App\Http\Requests\StudioUpdateRequest;
use App\Http\Resources\StudioResource;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function store(StudioCreateRequest $request)
    {
        $studio = Studio::create($request->all());

        return response()->json(new StudioResource($studio))->setStatusCode(201);
    }

    public function index()
    {
        $studios = Studio::all();

        return response()->json(StudioResource::collection($studios))->setStatusCode(200);
    }

    public function show($studio_id)
    {
        $studio = Studio::where('id', $studio_id)->firstOrFail();

        if (empty($studio)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json([
            'studio' => new StudioResource($studio),
        ])->setStatusCode(200);
    }

    public function update(StudioUpdateRequest $request, $id)
    {
        $studio = Studio::find($id);

        if (empty($studio)) {
            throw new ApiException('Not Found', 404);
        }

        $studio->update($request->validated());

        return response()->json([
            'studio' => new StudioResource($studio),
        ])->setStatusCode(200);
    }

    public function destroy($studio_id)
    {
        $studio = Studio::find($studio_id);

        if (empty($studio)) {
            throw new ApiException('Not Found', 404);
        }

        Studio::destroy($studio_id);

        return response()->json('Студия удалена')->setStatusCode(200, 'Удалено');
    }
}
