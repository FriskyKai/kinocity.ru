<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'description' => 'string|max:255',
            'type' => 'boolean',
            'duration' => 'integer',
            'release' => 'date',
            'rating' => 'decimal:3,1',
            'episodes' => 'integer',
            'preview' => 'file|mimes:jpeg,jpg,png,gif|max:10000',
            'contentURL' => 'string|max:255',
            'studio_id' => 'integer|exists:studios,id',
            'age_rating_id' => 'integer|exists:age_ratings,id',
        ];
    }
}
