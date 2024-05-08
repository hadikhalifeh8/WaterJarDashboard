<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomersOrders extends FormRequest
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
            'driver_id' => 'required',
            'customer_id'=>'required|unique:customers_orders,customer_id,'.$this->id,

            'town_id' => 'required',
            'district_id' => 'required',
            
            
        ];
    }



    public function messages()
    {
        return [
            'driver_id.required' => trans('customers_OrdersTransl.validation_driver'),
            'customer_id.required' => trans('customers_OrdersTransl.validation_customer'),
            'customer_id.unique' => trans('customers_OrdersTransl.validation_customer_unique'),

            'town_id.required' => trans('customers_OrdersTransl.validation_town'),
            'district_id.required' => trans('customers_OrdersTransl.validation_district'),
            

        ];
    }




}
