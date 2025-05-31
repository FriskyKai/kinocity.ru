<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesCreateRequest;
use App\Http\Requests\SeriesUpdateRequest;
use App\Models\Media;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesWebController extends Controller
{
    public function create(Request $request)
    {
        $mediaId = $request->query('media_id');
        $media = Media::find($mediaId); // Получаем объект медиа

        if (!$media) {
            abort(404, 'Media not found');
        }

        return view('series.create', compact('media'));
    }

    public function store(SeriesCreateRequest $request)
    {
        $series = Series::create($request->all());

        return redirect()->route('media.show', $request->media_id);
    }
    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->back()
            ->with('success', 'Серия успешно удалена');
    }
}
