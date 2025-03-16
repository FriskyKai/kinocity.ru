<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaActorCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'actor_id' => 'required|integer|exists:actors,id',
        ];
    }
}
