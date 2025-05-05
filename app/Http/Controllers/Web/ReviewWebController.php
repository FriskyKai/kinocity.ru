<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewWebController extends Controller
{
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $mediaId = $review->media_id;

        $review->delete();

        return redirect()->route('media.show', $mediaId)->with('success', 'Отзыв удалён.');
    }
}
