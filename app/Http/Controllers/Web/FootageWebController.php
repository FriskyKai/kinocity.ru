<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FootageCreateRequest;
use App\Http\Requests\FootageUpdateRequest;
use App\Models\Media;
use App\Models\MediaFootage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FootageWebController extends Controller
{
    public function create(Request $request)
    {
        $media = Media::findOrFail($request->input('media_id'));

        return view('footages.create', compact('media'));
    }

    public function store(FootageCreateRequest $request)
    {
        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('footages', 'public');
            $data['photo'] = $path;
        }

        $footage = MediaFootage::create($data);

        return redirect()->route('media.show', $request->media_id);
    }

    public function show($id) {
        $footage = MediaFootage::findOrFail($id);
        $media = $footage->media; // если у тебя есть связь с media

        return view('footages.show', compact('footage', 'media'));
    }

    public function edit(Request $request, $id)
    {
        $footage = MediaFootage::findOrFail($id);
        $media = $footage->media;

        return view('footages.edit', compact('footage', 'media'));
    }

    public function update(FootageUpdateRequest $request, $id) {
        $footage = MediaFootage::findOrFail($id);

        $data = $request->validated();

        // Обработка photo-файла
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('footages', 'public');
            $data['photo'] = $path;
        }

        $footage->update($data);

        return redirect()->route('media.show', $request->media_id);
    }

    public function destroy($id)
    {
        $footage = MediaFootage::findOrFail($id);
        $mediaId = $footage->media_id;

        // Удаляем photo-файл
        if ($footage->photo && Storage::disk('public')->exists($footage->photo)) {
            Storage::disk('public')->delete($footage->photo);
        }

        $footage->delete();

        return redirect()->route('media.show', $mediaId)->with('success', 'Кадр удалён.');
    }
}
