<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorWebController extends Controller
{
    public function create()
    {
        return view('directors.create');
    }

    public function store(BiographyCreateRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $director = Director::create($data);

        if ($request->filled('media_id')) {
            return redirect()->route('media-directors.create', ['media_id' => $request->media_id])
                ->with('success', 'Режиссёр успешно создан. Теперь вы можете привязать его к медиа.');
        }

        return redirect()->route('directors.index')->with('success', 'Режиссёр успешно создан.');
    }

    public function index()
    {
        $directors = Director::all();

        return view('directors.index', compact('directors'));
    }

    public function show(Director $director) {
        return view('directors.show', compact('director'));
    }

    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

    public function update(BiographyUpdateRequest $request, Director $director) {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $director->update($data);

        return redirect()->route('directors.index');
    }

    public function destroy(Director $director)
    {
        // Удаляем photo-файл, если есть
        if ($director->photo && Storage::disk('public')->exists($director->photo)) {
            Storage::disk('public')->delete($director->photo);
        }

        Director::destroy($director->id);

        return redirect()->route('directors.index');
    }
}
