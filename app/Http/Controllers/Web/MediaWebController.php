<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaCreateRequest;
use App\Http\Requests\MediaUpdateRequest;
use App\Http\Resources\MediaResource;
use App\Models\AgeRating;
use App\Models\Media;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaWebController extends Controller
{
    public function create()
    {
        $studios = Studio::all();
        $ageRatings = AgeRating::all();

        return view('media.create', compact('studios', 'ageRatings'));
    }

    public function store(MediaCreateRequest $request)
    {
        $data = $request->validated();

        // Обработка preview-файла
        if ($request->hasFile('preview')) {
            $path = $request->file('preview')->store('previews', 'public');
            $data['preview'] = $path;
        }

        $media = Media::create($data);

        return redirect()->route('media.index');
    }

    public function index()
    {
        $mediaCatalog = Media::all();

        return view('media.index', compact('mediaCatalog'));
    }

    public function show(Media $media) {
        return view('media.show', compact('media'));
    }

    public function edit(Media $media)
    {
        $studios = Studio::all();
        $ageRatings = AgeRating::all();

        return view('media.edit', compact('media', 'studios', 'ageRatings'));
    }

    public function update(MediaUpdateRequest $request, Media $media) {
        $data = $request->validated();

        // Обработка preview-файла
        if ($request->hasFile('preview')) {
            $path = $request->file('preview')->store('previews', 'public');
            $data['preview'] = $path;
        }

        $media->update($data);

        return redirect()->route('media.index');
    }

    public function destroy(Media $media) {
        if (empty($media)) {
            throw new ApiException('Not Found', 404);
        }

        DB::beginTransaction();

        try {
            // Удаляем связанные записи
            $media->favorites()->delete();
            $media->reviews()->delete();
            $media->mediaActors()->delete();
            $media->mediaDirectors()->delete();
            $media->mediaGenres()->delete();
            $media->mediaFootages()->delete();

            // Удаляем preview-файл, если есть
            if ($media->preview && Storage::disk('public')->exists($media->preview)) {
                Storage::disk('public')->delete($media->preview);
            }

            // Удаляем медиа
            $media->delete();

            DB::commit();

            return response()->json('Медиа удалено успешно.')->setStatusCode(200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json('Ошибка удаления медиа: ' . $e->getMessage(), 500);
        }
    }
}
