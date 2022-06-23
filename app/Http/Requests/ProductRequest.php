<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'service_id' => 'required|integer|exists:services,id',
            'name_company' => 'required|string',
            'name_application' => 'required|string',
            'thumbnail_photo' => 'image|file|mimes:jpg,png,jpeg,gif,svg',
            'location' => 'required',
            'industry' => 'required|string',
            'size' => 'required',
            'case' => 'required',
            'works' => 'required',
            'link' => 'required',
        ];
    }
}
