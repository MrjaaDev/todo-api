<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required', Password::min(12)->letters()->numbers()->mixedCase()->symbols()->uncompromised()],
            'remember_token' => ['nullable'],
        ];
    }
}
