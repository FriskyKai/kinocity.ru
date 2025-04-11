<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaActorCreateRequest;
use App\Models\Actor;
use App\Models\Media;
use App\Models\MediaActor;
use Illuminate\Http\Request;

class MediaActorWebController extends Controller
{
    public function create(Request $request)
    {
        $actors = Actor::all();

        // Получаем ID медиа из запроса
        $mediaId = $request->query('media_id');
        $media = Media::find($mediaId);

        if (!$media) {
            throw new ApiException('Media not found', 404);
        }

        return view('media-actors.create', compact('actors', 'media'));
    }

    public function store(MediaActorCreateRequest $request)
    {
        $mediaActor = MediaActor::create($request->validated());

        return redirect()->route('media.show', $request->media_id);
    }

    public function destroy($id)
    {
        $record = MediaActor::findOrFail($id);
        $mediaId = $record->media_id;

        $record->delete();

        return redirect()->route('media.show', $mediaId)->with('success', 'Актёр удалён.');
    }
}
