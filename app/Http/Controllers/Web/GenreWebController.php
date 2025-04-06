<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreCreateRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreWebController extends Controller
{
    public function create()
    {
        return view('genres.create');
    }

    public function store(GenreCreateRequest $request) {
        $genre = Genre::create($request->all());

        return redirect()->route('genres.index');
    }

    public function index()
    {
        $genres = Genre::all();

        return view('genres.index', compact('genres'));
    }

    public function show(Genre $genre) {
        return view('genres.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(GenreUpdateRequest $request, Genre $genre) {
        $genre->update($request->validated());

        return redirect()->route('genres.index');
    }

    public function destroy(Genre $genre)
    {
        Genre::destroy($genre->id);

        return redirect()->route('genres.index');
    }
}
