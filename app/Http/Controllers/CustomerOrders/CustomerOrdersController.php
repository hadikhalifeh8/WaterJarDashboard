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
           
            $validated = $request->validated();
            
    
               $insert_customers_orders = new CustomerOrdersModel();

               $insert_customers_orders->driver_id = $request->driver_id;
               $insert_customers_orders->customer_id = $request->customer_id;

    
               $insert_customers_orders->town_id = $request->town_id;
               $insert_customers_orders->district_id = $request->district_id;
    
              
    
    
               $insert_customers_orders->tannourine_id = $request->tannourine;
               $insert_customers_orders->tann_price_Lira = $request->tann_price_Lira;
               $insert_customers_orders->tann_price_Dollar = $request->tann_price_Dollar;
    
    
               $insert_customers_orders->serepta_id = $request->serepta;
               $insert_customers_orders->srpta_price_Lira = $request->serep_price_Lira;
               $insert_customers_orders->srpta_price_Dollar = $request->serep_price_Dollar;
    
               $insert_customers_orders->save();
    
           
    
            toastr()->success(trans('messages.success'));
           return redirect()->route('CustomerOrders.index');
       } catch (\Exception $e) {
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
            $validated = $request->validated();
    
            $update_customer = CustomerOrdersModel::findOrFail($request->id); 
            $update_customer->update([

                'driver_id' => $request->driver_id,
                'customer_id' => $request->customer_id,
            
               'town_id' => $request->town_id,
               'district_id' => $request->district_id,
            
    
            'tannourine_id' => $request->tannourine,
            'tann_price_Lira' => $request->tann_price_Lira,
            'tann_price_Dollar' => $request->tann_price_Dollar,
    
            'serepta_id' => $request->serepta,
            'srpta_price_Lira' => $request->serep_price_Lira,
            'srpta_price_Dollar' => $request->serep_price_Dollar,
            
            ]); 
    
            toastr()->info(trans('messages.update'));
            return redirect()->route('CustomerOrders.index');
        } catch (\Exception $e) {
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



}
