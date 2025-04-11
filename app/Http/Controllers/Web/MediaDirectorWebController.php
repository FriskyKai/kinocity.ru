<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaDirectorCreateRequest;
use App\Models\Director;
use App\Models\Media;
use App\Models\MediaDirector;
use Illuminate\Http\Request;

class MediaDirectorWebController extends Controller
{
    public function create(Request $request)
    {
        $directors = Director::all();

        // Получаем ID медиа из запроса
        $mediaId = $request->query('media_id');
        $media = Media::find($mediaId);

        if (!$media) {
            throw new ApiException('Media not found', 404);
        }

        return view('media-directors.create', compact('directors', 'media'));
    }

    public function store(MediaDirectorCreateRequest $request)
    {
        $mediaDirector = MediaDirector::create($request->validated());

        return redirect()->route('media.show', $request->media_id);
    }

    public function destroy($id)
    {
        $record = MediaDirector::findOrFail($id);
        $mediaId = $record->media_id;

        $record->delete();

        return redirect()->route('media.show', $mediaId)->with('success', 'Режисссёр удалён.');
    }
}
