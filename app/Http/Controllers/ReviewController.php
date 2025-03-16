<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\ReviewCreateRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewCreateRequest $request)
    {
        $review = Review::create([
            'user_id' => auth()->id(),
            'media_id' => $request->media_id,
            'text' => $request->text,
            'rating' => $request->rating,
        ]);

        return response()->json(new ReviewResource($review), 201);
    }

    public function index(Request $request)
    {
        // Проверяем, передан ли media_id в запросе
        if ($request->has('media_id')) {
            // Фильтруем отзывы по media_id
            $reviews = Review::where('media_id', $request->media_id)->get();
        } else {
            // Если media_id не передан, возвращаем все отзывы
            $reviews = Review::all();
        }

        // Возвращаем отзывы в виде коллекции ресурсов
        return response()->json(ReviewResource::collection($reviews))->setStatusCode(200);
    }

    public function update(ReviewUpdateRequest $request, $id)
    {
        $review = Review::find($id);

        if (empty($review)) {
            throw new ApiException('Not Found', 404);
        }

        $review->update($request->validated());

        return response()->json([
            'review' => new ReviewResource($review),
        ])->setStatusCode(200);
    }

    public function destroy($review_id)
    {
        $review = Review::find($review_id);

        if (empty($review)) {
            throw new ApiException('Not Found', 404);
        }

        Review::destroy($review_id);

        return response()->json('Отзыв удалён')->setStatusCode(200, 'Удалено');
    }
}
