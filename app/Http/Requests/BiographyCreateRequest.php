<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiographyCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'required|string||max:255',
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'bio' => 'required|string|max:255',
            'photo' => 'file|mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }
}
