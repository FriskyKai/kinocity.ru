<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesCreateRequest;
use App\Http\Requests\SeriesUpdateRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesWebController extends Controller
{
    public function create(Request $request)
    {
        $mediaId = $request->query('media_id');

        return view('series.create', compact('mediaId'));
    }

    public function store(SeriesCreateRequest $request)
    {
        $series = Series::create($request->all());

        // Проверяем, был ли передан media_id для возврата на media-genres.create
        if ($request->filled('media_id')) {
            return redirect()->route('series.create', ['media_id' => $request->media_id])
                ->with('success', 'Серия успешно добавлена. Теперь вы можете привязать его к медиа.');
        }

        // Если нет media_id — стандартный редирект, например, в список жанров
        return redirect()->route('series.index')->with('success', 'Серия успешно добавлена.');
    }

    public function index()
    {
        $series = Series::all();

        return view('series.index', compact('series'));
    }

    public function show(Series $series) {
        return view('series.show', compact('series'));
    }

    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    public function update(SeriesUpdateRequest $request, Series $series) {
        $series->update($request->validated());

        return redirect()->route('series.index');
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->back()
            ->with('success', 'Серия успешно удалена');
    }
}
