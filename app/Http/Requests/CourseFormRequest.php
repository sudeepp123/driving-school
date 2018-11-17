<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
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
     * @return array-
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3',
            'fees'=>'required|min:3',
            'description'=>'required|min:3',
            'duration'=>'required',

        ];
    }
}
