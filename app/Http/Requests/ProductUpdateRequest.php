<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['required', 'string', 'max:100'],
            'price'=>['required','numeric'],
            'discount'=>['required','numeric'],
            'catagory'=>'required',
            'quantity'=>['required','numeric'],
            'description'=>['required','string', 'min:50'],
        ];
    }
}
