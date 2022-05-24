<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name'=>'required|string|min:3|max:25',
            'last_name'=>'required|string|min:3|max:25',
            'city'=>'required|string|min:3|max:25',
            'student_number'=>'required|numeric|digits_between:14,14|unique:students',
            'national_code'=>'required|numeric|digits_between:10,10|unique:students',
            'vaccine'=>'required|numeric',
            'request_dormitory'=>'nullable',
        ];
    }
}
