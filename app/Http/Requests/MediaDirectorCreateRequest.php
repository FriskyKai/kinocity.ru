<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaDirectorCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'director_id' => 'required|integer|exists:directors,id',
        ];
    }
}
