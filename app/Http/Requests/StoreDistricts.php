<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDistricts extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'List_Districts.*.name_ar' => 'required|unique:districts,name->ar,'.$this->id,
            'List_Districts.*.name_en' => 'required|unique:districts,name->en,'.$this->id,
            'List_Districts.*.town' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'List_Districts.*.name_ar.required' =>  trans('districtsTransl.validation_name_ar') ,
            'List_Districts.*.name_en.required' => trans('districtsTransl.validation_name_en'),
            'List_Districts.*.town' => trans('districtsTransl.validation_town') ,


            'List_Districts.*.name_ar.unique' => trans('districtsTransl.unique_name_ar'),
            'List_Districts.*.name_en.unique' => trans('districtsTransl.unique_name_en'),
        ];
    }
}
