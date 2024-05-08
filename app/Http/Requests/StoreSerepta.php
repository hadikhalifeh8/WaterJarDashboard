<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSerepta extends FormRequest
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
            'List_Serepta.*.name_ar' => 'required|unique:serepta,name->ar,'.$this->id,
            'List_Serepta.*.name_en' => 'required|unique:serepta,name->en,'.$this->id,
            'List_Serepta.*.price_Lira' => 'required',
            'List_Serepta.*.price_Dollar' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'List_Serepta.*.name_ar.required' =>  trans('sereptaTransl.validation_name_ar') ,
            'List_Serepta.*.name_en.required' => trans('sereptaTransl.validation_name_en'),
            'List_Serepta.*.price_Lira' => trans('sereptaTransl.validation_price_Lira') ,
            'List_Serepta.*.price_Dollar' => trans('sereptaTransl.validation_price_Dollar') ,



            'List_Serepta.*.name_ar.unique' => trans('sereptaTransl.unique_name_ar'),
            'List_Serepta.*.name_en.unique' => trans('sereptaTransl.unique_name_en'),
        ];
    }
}
