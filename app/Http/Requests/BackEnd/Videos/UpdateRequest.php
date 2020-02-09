<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'meta_keywords'=>['nullable', 'string', 'max:255'],
            'meta_des'=>['nullable', 'string', 'max:255'],
            'des'=>['required', 'string', 'min:10'],
            'category_id'=>['required'],
            'youtube'=>['required', 'url'],
            'user_id'=>['required'],
            'published'=>['required'],
            'image'=>['image'],
        ];
    }
}
