<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|boolean',
            'duration' => 'required|integer',
            'release' => 'required|date',
            'rating' => 'required|numeric|between:0,10|regex:/^\d{1,2}(\.\d{1})?$/',
            'episodes' => 'nullable|integer',
            'preview' => 'required|file|max:2048|mimes:jpeg,jpg,png',
            'contentURL' => 'required|string|max:255',
            'studio_id' => 'required|integer|exists:studios,id',
            'age_rating_id' => 'required|integer|exists:age_ratings,id',
        ];
    }
}
