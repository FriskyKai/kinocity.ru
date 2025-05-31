<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActorWebController extends Controller
{
    public function create()
    {
        return view('actors.create');
    }

    public function store(BiographyCreateRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $actor = Actor::create($data);

        // Вернуться к форме привязки к медиа
        if ($request->has('media_id')) {
            return redirect()->route('media-actors.create', [
                'media_id' => $request->media_id
            ]);
        }

        return redirect()->route('actors.index')->with('success', 'Актёр успешно создан.');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $actors = Actor::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('surname', 'like', '%' . $search . '%');
        })->get();

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
        // Удаляем photo-файл, если есть
        if ($actor->photo && Storage::disk('public')->exists($actor->photo)) {
            Storage::disk('public')->delete($actor->photo);
        }

        Actor::destroy($actor->id);

        return redirect()->route('actors.index');
    }
}
