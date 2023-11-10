<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(12)->letters()->numbers()->mixedCase()->symbols()->uncompromised()],
        ];
    }
}
