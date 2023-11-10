<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
            'done' => ['required'],
            'user' => ['required', 'integer'],
        ];
    }
}
