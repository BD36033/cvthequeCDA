<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'designation' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'designation.required' => 'La désignation est obligatoire',
            'designation.max' => 'La désignation ne doit pas dépasser 255 caractères',
            'description.required' => 'La description est obligatoire',
            'description.max' => 'La description ne doit pas dépasser 255 caractères',
        ];
    }
}
