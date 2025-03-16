<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\GenreCreateRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function store(GenreCreateRequest $request)
    {
        $genre = Genre::create($request->all());

        return response()->json(new GenreResource($genre))->setStatusCode(201);
    }

    public function index()
    {
        $genres = Genre::all();

        return response()->json(GenreResource::collection($genres))->setStatusCode(200);
    }

    public function show($genre_id)
    {
        $genre = Genre::where('id', $genre_id)->firstOrFail();

        if (empty($genre)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json([
            'genre' => new GenreResource($genre),
        ])->setStatusCode(200);
    }

    public function update(GenreUpdateRequest $request, $id)
    {
        $genre = Genre::find($id);

        if (empty($genre)) {
            throw new ApiException('Not Found', 404);
        }

        $genre->update($request->validated());

        return response()->json([
            'genre' => new GenreResource($genre),
        ])->setStatusCode(200);
    }

    public function destroy($genre_id)
    {
        $genre = Genre::find($genre_id);

        if (empty($genre)) {
            throw new ApiException('Not Found', 404);
        }

        Genre::destroy($genre_id);

        return response()->json('Жанр удалён')->setStatusCode(200, 'Удалено');
    }
}
