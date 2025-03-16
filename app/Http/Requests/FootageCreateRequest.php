<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FootageCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'photo' => 'required|file|max:2048|mimes:jpeg,jpg,png',
        ];
    }
}
