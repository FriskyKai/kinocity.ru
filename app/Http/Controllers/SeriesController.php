<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\SeriesCreateRequest;
use App\Http\Requests\SeriesUpdateRequest;
use App\Http\Resources\SeriesResource;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function store(SeriesCreateRequest $request)
    {
        $series = Series::create([
            'media_id' => $request->media_id,
            'series_number' => $request->series_number,
            'url' => $request->url,
        ]);

        return response()->json(new SeriesResource($series), 201);
    }

    // Просмотр всех серий по media_id
    public function index(Request $request)
    {
        // Проверяем, передан ли media_id в запросе
        if ($request->has('media_id')) {
            // Фильтруем серии по media_id
            $series = Series::where('media_id', $request->media_id)->get();

            if (empty($series)) {
                throw new ApiException('Not Found', 404);
            }
        } else {
            // Если media_id не передан, возвращаем сообщение
            return response()->json('Не указан сериал для поиска серий')->setStatusCode(200);
        }

        // Возвращаем серии в виде коллекции ресурсов
        return response()->json(SeriesResource::collection($series))->setStatusCode(200);
    }

    // Просмотр серии по media_id и series_number
    public function show(Request $request)
    {
        $series = Series::where('media_id', $request->media_id)->where('series_number', $request->series_number)->first();

        if (empty($series)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json([
            'series' => new SeriesResource($series),
        ])->setStatusCode(200);
    }

    public function update(SeriesUpdateRequest $request, $id)
    {
        $series = Series::find($id);

        if (empty($series)) {
            throw new ApiException('Not Found', 404);
        }

        $series->update($request->validated());

        return response()->json([
            'series' => new SeriesResource($series),
        ])->setStatusCode(200);
    }

    public function destroy($series_id)
    {
        $series = Series::find($series_id);

        if (empty($series)) {
            throw new ApiException('Not Found', 404);
        }

        Series::destroy($series_id);

        return response()->json('Серия удалена')->setStatusCode(200, 'Удалено');
    }
}
