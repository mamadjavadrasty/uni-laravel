<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'first_name'=>'nullable|string',
            'last_name'=>'nullable|string',
            'city'=>'nullable|string',
            'national_code'=>'nullable|numeric|digits_between:10,10',
            'vaccine'=>'nullable',
            'request_dormitory'=>'nullable',
            'limit'=>'required|numeric'
        ];
    }
}
