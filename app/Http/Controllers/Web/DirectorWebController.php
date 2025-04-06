<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiographyCreateRequest;
use App\Http\Requests\BiographyUpdateRequest;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorWebController extends Controller
{
    public function create()
    {
        return view('directors.create');
    }

    public function store(BiographyCreateRequest $request) {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $director = Director::create($data);

        return redirect()->route('directors.index');
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
        Director::destroy($director->id);

        return redirect()->route('directors.index');
    }
}
