<?php

namespace App\Http\Requests\BackEnd\Pages;

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
            'name' => ['required', 'string', 'max:255','unique:pages,name,'.$this->page],
            'meta_keywords'=>['nullable', 'string', 'max:255'],
            'meta_des'=>['nullable', 'string', 'max:255'],
            'des'=>['required', 'min:10']
        ];
    }
}
