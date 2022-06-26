<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'name'  => 'string|required',
            'description' => 'string',
            'thumbnail_photo' => 'image|file|mimes:jpg,png,jpeg,gif,svg'
        ];
    }

}
