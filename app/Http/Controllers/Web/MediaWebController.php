<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaCreateRequest;
use App\Http\Requests\MediaUpdateRequest;
use App\Http\Resources\MediaResource;
use App\Models\Actor;
use App\Models\AgeRating;
use App\Models\Director;
use App\Models\Media;
use App\Models\MediaActor;
use App\Models\MediaDirector;
use App\Models\MediaFootage;
use App\Models\Review;
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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $mediaCatalog = Media::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return view('media.index', compact('mediaCatalog'));
    }

    public function show(Media $media) {
        $footages = MediaFootage::where('media_id', $media->id)->get();

        $reviews = Review::where('media_id', $media->id)->get();

        // Актёры через media_actors
        $actors = $media->mediaActors()->with('actor')->get()->pluck('actor');

        // Режиссёры через media_directors
        $directors = $media->mediaDirectors()->with('director')->get()->pluck('director');

        // Жанры через media_genres
        $genres = $media->mediaGenres()->with('genre')->get()->pluck('genre');

        return view('media.show', compact('media', 'footages', 'directors', 'actors', 'genres', 'reviews'));
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

            return redirect()->route('media.index');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('media.index');
        }
    }
}
