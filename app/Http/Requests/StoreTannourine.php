<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTannourine extends FormRequest
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
            'List_Tannourine.*.name_ar' => 'required|unique:districts,name->ar,'.$this->id,
            'List_Tannourine.*.name_en' => 'required|unique:districts,name->en,'.$this->id,
            'List_Tannourine.*.price_Lira' => 'required',
            'List_Tannourine.*.price_Dollar' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'List_Tannourine.*.name_ar.required' =>  trans('sereptaTransl.validation_name_ar') ,
            'List_Tannourine.*.name_en.required' => trans('sereptaTransl.validation_name_en'),
            'List_Tannourine.*.price_Lira' => trans('sereptaTransl.validation_price_Lira') ,
            'List_Tannourine.*.price_Dollar' => trans('sereptaTransl.validation_price_Dollar') ,



            'List_Tannourine.*.name_ar.unique' => trans('sereptaTransl.unique_name_ar'),
            'List_Tannourine.*.name_en.unique' => trans('sereptaTransl.unique_name_en'),
        ];
    }
}
