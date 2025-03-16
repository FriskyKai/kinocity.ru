<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiException extends HttpResponseException
{
    public function __construct($message = "", $code = 500, $errors = [])
    {
        // Убедимся, что код статуса является допустимым HTTP-кодом
        if ($code < 100 || $code >= 600) {
            $code = 500; // Устанавливаем код по умолчанию, если переданный код некорректен
        }

        $exception = [
            'message' => $message,
            'code' => $code,
        ];


        if (!empty($errors)) {
            $exception['errors'] = $errors;
        }

        parent::__construct(response()->json($exception)->setStatusCode($code));
    }
}
