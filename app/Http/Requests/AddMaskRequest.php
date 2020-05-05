<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMaskRequest extends FormRequest
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
            'name'=> 'required',
            'category' => 'required',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле название маски обязательно',
            'category.required' => 'Поле категория обязательно',
            'price.required' => 'Поле цена обязательно'
        ];
    }
}
