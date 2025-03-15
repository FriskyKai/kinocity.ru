<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Http\Resources\BiographyResource;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function store(BiographyCreateRequest $request)
    {
        $actor = Actor::create($request->all());

        return response()->json(new BiographyResource($actor))->setStatusCode(201);
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

    public function update(BiographyUpdateRequest $request, Actor $actor)
    {
        if (empty($actor->id)) {
            throw new ApiException('Not Found', 404);
        }

        $actor->update($request->validated());

        return response()->json([
            'actor' => new BiographyResource($actor),
        ])->setStatusCode(200);
    }

    public function destroy($actor_id)
    {
        $actor = Actor::find($actor_id);

        if (empty($actor)) {
            throw new ApiException('Not Found', 404);
        }

        Actor::destroy($actor_id);

        return response()->json('Актёр удалён')->setStatusCode(200, 'Удалено');
    }
}
