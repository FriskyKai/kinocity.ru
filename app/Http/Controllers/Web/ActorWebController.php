<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorWebController extends Controller
{
    public function create()
    {
        return view('actors.create');
    }

    public function store(BiographyCreateRequest $request) {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $actor = Actor::create($data);

        return redirect()->route('actors.index');
    }

    public function index()
    {
        $actors = Actor::all();

        return view('actors.index', compact('actors'));
    }

    public function show(Actor $actor) {
        return view('actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function update(BiographyUpdateRequest $request, Actor $actor) {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $actor->update($data);

        return redirect()->route('actors.index');
    }

    public function destroy(Actor $actor)
    {
        Actor::destroy($actor->id);

        return redirect()->route('actors.index');
    }
}
