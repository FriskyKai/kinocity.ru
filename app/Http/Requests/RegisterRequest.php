<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'required|string|min:2|max:32',
            'name' => 'required|string|min:2|max:32',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:255',
            'birthday' => 'required|date',
            'avatar' => 'file|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
}
