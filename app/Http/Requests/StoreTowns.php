<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTowns extends FormRequest
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
            
            'List_Towns.*.name_ar' => 'required|unique:towns,name->ar,'.$this->id,
            'List_Towns.*.name_en' => 'required|unique:towns,name->en,'.$this->id,

        ];
    }

    public function messages()
    {
        return [
            'List_Towns.*.name_ar.required' =>  trans('townsTransl.validation_name_ar') ,
            'List_Towns.*.name_en.required' => trans('townsTransl.validation_name_en'),

            'List_Towns.*.name_ar.unique' => trans('townsTransl.unique_name_ar'),
            'List_Towns.*.name_en.unique' => trans('townsTransl.unique_name_en'),
        ];
    }
}
