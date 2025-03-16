<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'text' => 'required|string|max:255',
            'rating' => 'required|integer|between:0,10',
        ];
    }
}
