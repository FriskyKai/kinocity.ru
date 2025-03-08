<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\ApiException;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new ApiException(422, '', $validator->errors());
    }

    protected function failedAuthorization()
    {
        throw new ApiException(403, 'Forbidden for you');
    }
}
