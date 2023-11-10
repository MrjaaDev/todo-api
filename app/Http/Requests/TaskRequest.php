<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
            'done' => ['required'],
//            'user_id' => ['required', 'integer'],
        ];
    }
}
