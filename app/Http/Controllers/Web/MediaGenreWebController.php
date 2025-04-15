<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaGenreCreateRequest;
use App\Models\Genre;
use App\Models\Media;
use App\Models\MediaGenre;
use Illuminate\Http\Request;

class MediaGenreWebController extends Controller
{
    public function create(Request $request)
    {
        $genres = Genre::all();

        // Получаем ID медиа из запроса
        $mediaId = $request->query('media_id');
        $media = Media::find($mediaId);

        if (!$media) {
            throw new ApiException('Media not found', 404);
        }

        return view('media-genres.create', compact('genres', 'media'));
    }

    public function store(MediaGenreCreateRequest $request)
    {
        $mediaGenre = MediaGenre::create($request->validated());

        return redirect()->route('media.show', $request->media_id);
    }

    public function destroy($id)
    {
        $record = MediaGenre::findOrFail($id);
        $mediaId = $record->media_id;

        $record->delete();

        return redirect()->route('media.show', $mediaId)->with('success', 'Жанр удалён.');
    }
}
