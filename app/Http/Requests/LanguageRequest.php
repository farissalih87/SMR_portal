<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name'=>'required',
            'abbr'=>'required',
            'locale'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Please Enter Language Name',
            'abbr.required'=>'Please Enter Abbr ex.(en)',
            'locale.required'=>'Please Enter Localization ex.(en_US)',
        ];
    }
}
