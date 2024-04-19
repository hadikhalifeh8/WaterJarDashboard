<?php

namespace App\Http\Controllers\CustomerOrders;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomersOrders;
use App\Models\CustomerOrdersModel;
use App\Models\CustomersModel;
use App\Models\DistrictsModel;
use App\Models\DriversModel;
use App\Models\SereptaModel;
use App\Models\TannourineModel;
use App\Models\TownsModel;
use Illuminate\Http\Request;

class CustomerOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerOrders = CustomerOrdersModel::all();
        $customers = CustomersModel::all();
        $town = TownsModel::all();
        $district = DistrictsModel::all();
        $tannourine =TannourineModel::all();
        $serepta = SereptaModel::all();
        $driver = DriversModel::all();

        return view('pages.CustomerOrders.CustomerOrders', compact('customerOrders', 'customers', 'town', 'district', 'tannourine', 'serepta', 'driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersOrders $request)
    {
        try {
            // Validate the request
            $validated = $request->validated();
    
            // Load all towns, districts, drivers, and customers
            $towns = TownsModel::all();
            $districts = DistrictsModel::all();
            $drivers = DriversModel::all();
            $customers = CustomersModel::all();
            $serepta = SereptaModel::all();

    
            // Create a new customer orders instance
            $insert_customers_orders = new CustomerOrdersModel();
    
            // Set customer orders attributes
            $insert_customers_orders->driver_id = $request->driver_id;
            $insert_customers_orders->customer_id = $request->customer_id;
            $insert_customers_orders->town_id = $request->town_id;
            $insert_customers_orders->district_id = $request->district_id;
            // $insert_customers_orders->tannourine_id = $request->tannourine;
            // $insert_customers_orders->tann_price_Lira = $request->tann_price_Lira;
            // $insert_customers_orders->tann_price_Dollar = $request->tann_price_Dollar;
            $insert_customers_orders->serepta_id = $request->serepta;
            $insert_customers_orders->srpta_price_Lira = $request->serep_price_Lira;
            $insert_customers_orders->srpta_price_Dollar = $request->serep_price_Dollar;
    
            // Find associated driver, customer, town, and district
            $driver = $drivers->find($request->driver_id);
            $customer = $customers->find($request->customer_id);
            $town = $towns->find($request->town_id);
            $district = $districts->find($request->district_id);
            $serepta = $serepta->find($request->serepta);

    
            // If driver, customer, town, and district are found, set their translations
            if ($driver) {
                $insert_customers_orders->driver_name_ar = $driver->getTranslation('name', 'ar');
                $insert_customers_orders->driver_name_en = $driver->getTranslation('name', 'en');
            }
    
            if ($customer) {
                $insert_customers_orders->customer_name_ar = $customer->getTranslation('name', 'ar');
                $insert_customers_orders->customer_name_en = $customer->getTranslation('name', 'en');
            }
    
            if ($town) {
                $insert_customers_orders->town_name_ar = $town->getTranslation('name', 'ar');
                $insert_customers_orders->town_name_en = $town->getTranslation('name', 'en');
            }
    
            if ($district) {
                $insert_customers_orders->district_name_ar = $district->getTranslation('name', 'ar');
                $insert_customers_orders->district_name_en = $district->getTranslation('name', 'en');
            }

            if ($serepta) {
                $insert_customers_orders->serepta_name_ar = $serepta->getTranslation('name', 'ar');
                $insert_customers_orders->serepta_name_en = $serepta->getTranslation('name', 'en');
            }
    
            // Save the customer orders
            $insert_customers_orders->save();
    
            // Redirect with success message
            toastr()->success(trans('messages.success'));
            return redirect()->route('CustomerOrders.index');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomersOrders $request)
    {
        try {
            // Validate the request
            $validated = $request->validated();
    
            // Find the customer order to update
            $update_customer_order = CustomerOrdersModel::findOrFail($request->id); 
    
            // Update the customer order with new values
            $update_customer_order->update([
                'driver_id' => $request->driver_id,
                'customer_id' => $request->customer_id,
                'town_id' => $request->town_id,
                'district_id' => $request->district_id,
                // 'tannourine_id' => $request->tannourine,
                // 'tann_price_Lira' => $request->tann_price_Lira,
                // 'tann_price_Dollar' => $request->tann_price_Dollar,
                'serepta_id' => $request->serepta,
                'srpta_price_Lira' => $request->serep_price_Lira,
                'srpta_price_Dollar' => $request->serep_price_Dollar,
            ]); 
    
            // Load all towns, districts, drivers, and customers
            $towns = TownsModel::all();
            $districts = DistrictsModel::all();
            $drivers = DriversModel::all();
            $customers = CustomersModel::all();
            $serepta = SereptaModel::all();
    
            // Find associated driver, customer, town, and district
            $driver = $drivers->find($request->driver_id);
            $customer = $customers->find($request->customer_id);
            $town = $towns->find($request->town_id);
            $district = $districts->find($request->district_id);
            $serepta = $serepta->find($request->serepta);

    
            // If driver, customer, town, and district are found, set their translations
            if ($driver) {
                $update_customer_order->driver_name_ar = $driver->getTranslation('name', 'ar');
                $update_customer_order->driver_name_en = $driver->getTranslation('name', 'en');
            }
    
            if ($customer) {
                $update_customer_order->customer_name_ar = $customer->getTranslation('name', 'ar');
                $update_customer_order->customer_name_en = $customer->getTranslation('name', 'en');
            }
    
            if ($town) {
                $update_customer_order->town_name_ar = $town->getTranslation('name', 'ar');
                $update_customer_order->town_name_en = $town->getTranslation('name', 'en');
            }
    
            if ($district) {
                $update_customer_order->district_name_ar = $district->getTranslation('name', 'ar');
                $update_customer_order->district_name_en = $district->getTranslation('name', 'en');
            }

            if ($serepta) {
                $update_customer_order->serepta_name_ar = $serepta->getTranslation('name', 'ar');
                $update_customer_order->serepta_name_en = $serepta->getTranslation('name', 'en');
            }
    
            // Save the updated customer order
            $update_customer_order->save();
    
            // Redirect with success message
            toastr()->info(trans('messages.update'));
            return redirect()->route('CustomerOrders.index');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        CustomerOrdersModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('CustomerOrders.index');
    }






    public function getcustomer($id)
    {
        $list_customers = CustomersModel::where("driver_id", $id)->pluck("name", "id");
        return $list_customers;
    }


    public function getTown($id){
        $customer = CustomersModel::find($id);
        if ($customer) {
            $townId = $customer->town_id;
            $townName = $customer->towns_rltn->name;
            return response()->json(['town_id' => $townId, 'town_name' => $townName]);
        } else {
            return response()->json('Customer not found', 404);
        }
    }

 


    public function get_district_s($id){
        $customer = CustomersModel::find($id);
        if ($customer) {
            $districtId = $customer->district_rltn->id;
            $districtName = $customer->district_rltn->name;
            return response()->json(['district_id' => $districtId, 'district_name' => $districtName]);
        } else {
            return response()->json('Customer not found', 404);
        }
    }



    public function getTannourinePriceLira($id){
        $tannourine_price_Lira = TannourineModel::where("id", $id)->pluck( "price_Lira", );
        return $tannourine_price_Lira;

    }

    public function getTannourinePriceDollar($id){
        $tannourine_price_Dollar = TannourineModel::where("id", $id)->pluck( "price_Dollar", );
        return $tannourine_price_Dollar;

    }


    public function getSereptaPriceLira($id){
        $serepta_price_Dollar = SereptaModel::where("id", $id)->pluck( "price_Lira", );
        return $serepta_price_Dollar;

    }


    public function getSereptaPriceDollar($id){
        $serepta_price_Dollar = SereptaModel::where("id", $id)->pluck( "price_Dollar", );
        return $serepta_price_Dollar;

    }





    // API
    public function viewCustomerOrder()
    {
        $customerOrder = CustomerOrdersModel::all();
        
        if($customerOrder)    {
                
            return response()->json([
                'status' => 'success',
                'data' => $customerOrder,
            ]);
        
        }else{
            return response()->json([
                'status' => 'failure',
                'data' => 'null',
            ]);

        }
    }



}
