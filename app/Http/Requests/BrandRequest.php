<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'image'=>'required_without:himage|mimes:jpg,jpeg,png',
            'brand.*.name'=>'required',
         //   'brand.*.name'=>'required',
         //   'brand.*.trans_lang'=>'required',


        ];
    }


}
