<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomers extends FormRequest
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
            'name_ar' => 'required|unique:customers,name->ar,'.$this->id,
            'name_en' => 'required|unique:customers,name->en,'.$this->id,
            'phone' => 'required|unique:customers,phone,'.$this->id,
            'town_id' => 'required',
            'district_id' => 'required',
          //  'driver_id' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'name_ar.required' =>  trans('customersTransl.validation_name_ar') ,
            'name_en.required' => trans('customersTransl.validation_name_en'),
            'phone.required' => trans('customersTransl.validation_phone'),

            'town_id.required' => trans('customersTransl.validation_town'),
            'district_id.required' => trans('customersTransl.validation_district'),
            'driver.required' => trans('customersTransl.validation_driver'),




            'name_ar.unique' => trans('customersTransl.unique_name_ar'),
            'name_en.unique' => trans('customersTransl.unique_name_en'),
            'phone.unique' => trans('customersTransl.unique_phone'),

        ];
    }
}
