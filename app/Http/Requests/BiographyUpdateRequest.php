<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiographyUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'string||max:255',
            'name' => 'string|max:255',
            'birthday' => 'date',
            'bio' => 'string|max:255',
            'photo' => 'file|max:2048|mimes:jpeg,jpg,png',
        ];
    }
}
