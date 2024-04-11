<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDrivers extends FormRequest
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
            // 'name_ar' => 'required|unique:drivers,name->ar,'.$this->id,
            // 'name_en' => 'required|unique:drivers,name->en,'.$this->id,
            // 'phone' => 'required|unique:drivers,phone,'.$this->id,
            'name_ar' => 'required'.$this->id,
            'name_en' => 'required'.$this->id,
            'phone' => 'required'.$this->id,
            'password' => 'required',
           // 'customer_id'=>'required'
          
        ];
    }


    public function messages()
    {
        return [
            'name_ar.required' =>  trans('driversTransl.validation_name_ar') ,
            'name_en.required' => trans('driversTransl.validation_name_en'),
            'phone.required' => trans('driversTransl.validation_phone'),
            'password.required' => trans('driversTransl.validation_password'),
          //  'customer_id.required' => trans('driversTransl.validation_customer'),


            // 'name_ar.unique' => trans('driversTransl.unique_name_ar'),
            // 'name_en.unique' => trans('driversTransl.unique_name_en'),
            // 'phone.unique' => trans('driversTransl.unique_phone'),



        ];
    }
}
