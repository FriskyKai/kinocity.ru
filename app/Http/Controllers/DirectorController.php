<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Http\Resources\BiographyResource;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function store(BiographyCreateRequest $request)
    {
        $director = Director::create($request->all());

        return response()->json(new BiographyResource($director))->setStatusCode(201);
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

    public function update(BiographyUpdateRequest $request, Director $director)
    {
        if (empty($director->id)) {
            throw new ApiException('Not Found', 404);
        }

        $director->update($request->validated());

        return response()->json([
            'director' => new BiographyResource($director),
        ])->setStatusCode(200);
    }

    public function destroy($director_id)
    {
        $director = Director::find($director_id);

        if (empty($director)) {
            throw new ApiException('Not Found', 404);
        }

        Director::destroy($director_id);

        return response()->json('Режиссёр удалён')->setStatusCode(200, 'Удалено');
    }
}
