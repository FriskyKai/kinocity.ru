<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'role_id' => 'integer|exists:roles,id',
            'surname' => 'string|min:2|max:32',
            'name' => 'string|min:2|max:32',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:6|max:255',
            'birthday' => 'date',
            'avatar' => 'file|max:2048|mimes:jpeg,jpg,png'
        ];
    }
}
