<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FootageUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_id' => 'integer|exists:media,id',
            'photo' => 'file|max:2048|mimes:jpeg,jpg,png',
        ];
    }
}
