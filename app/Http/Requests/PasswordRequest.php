<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
                'user' => 'required|string',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ];
    }
}
