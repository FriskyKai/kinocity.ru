<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudioUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
        ];
    }
}
