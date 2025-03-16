<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaGenreCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'genre_id' => 'required|integer|exists:genres,id',
        ];
    }
}
