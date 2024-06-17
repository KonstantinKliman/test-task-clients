<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fullName' => ['required', 'string'],
            'login' => ['required', 'string', 'unique:users,login'],
            'password' => ['required', 'string'],
            'passwordConfirmation' => ['required', 'string', 'same:password'],
        ];
    }
}
