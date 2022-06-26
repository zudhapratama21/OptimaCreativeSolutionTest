<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|required',
            'thumbnail_title' => 'string|required',
            'thumbnail_photo' => 'image|file|mimes:jpg,png,jpeg,gif,svg',
            'meta' => 'string|required',
            'meta_title'=>'string|required',
            'meta_description'=>'string|required',
            'description' => 'string'
        ];
    }
}
