<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudioCreateRequest;
use App\Http\Requests\StudioUpdateRequest;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioWebController extends Controller
{
    public function create()
    {
        return view('studios.create');
    }

    public function store(StudioCreateRequest $request) {
        $studio = Studio::create($request->all());

        return redirect()->route('studios.index');
    }

    public function index()
    {
        $studios = Studio::all();

        return view('studios.index', compact('studios'));
    }

    public function show(Studio $studio) {
        return view('studios.show', compact('studio'));
    }

    public function edit(Studio $studio)
    {
        return view('studios.edit', compact('studio'));
    }

    public function update(StudioUpdateRequest $request, Studio $studio) {
        $studio->update($request->validated());

        return redirect()->route('studios.index');
    }

    public function destroy(Studio $studio)
    {
        Studio::destroy($studio->id);

        return redirect()->route('studios.index');
    }
}
