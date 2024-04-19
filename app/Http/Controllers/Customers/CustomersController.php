<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomers;
use App\Models\CustomersModel;
use App\Models\DistrictsModel;
use App\Models\DriversModel;
use App\Models\SereptaModel;
use App\Models\TannourineModel;
use App\Models\TownsModel;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = CustomersModel::all();
        $town = TownsModel::all();
        $district = DistrictsModel::all();
        // $tannourine =TannourineModel::all();
        // $serepta = SereptaModel::all();
        $driver = DriversModel::all();


        return view('pages.Customers.customers', compact('customers', 'town', 'district', 'driver'));
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
    public function store(StoreCustomers $request)
    {
        try {
            // Validate the request
            $validated = $request->validated();
    
            // Load all towns, districts, and drivers
            $towns = TownsModel::all();
            $districts = DistrictsModel::all();
            $drivers = DriversModel::all();
    
            // Create a new customers instance
            $insert_customers = new CustomersModel();
            
            // Set customer's name and phone
            $insert_customers->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $insert_customers->phone = $request->phone;
    
            // Set town, district, and driver IDs
            $insert_customers->town_id = $request->town_id;
            $insert_customers->district_id = $request->district_id;
            $insert_customers->driver_id = $request->driver_id;
    
            // Find associated town, district, and driver
            $town = $towns->find($request->town_id);
            $district = $districts->find($request->district_id);
            $driver = $drivers->find($request->driver_id);
    
            // If town, district, and driver are found, set their translations
            if ($town) {
                $insert_customers->town_name_ar = $town->getTranslation('name', 'ar');
                $insert_customers->town_name_en = $town->getTranslation('name', 'en');
            }
    
            if ($district) {
                $insert_customers->district_name_ar = $district->getTranslation('name', 'ar');
                $insert_customers->district_name_en = $district->getTranslation('name', 'en');
            }
    
            if ($driver) {
                $insert_customers->driver_name_ar = $driver->getTranslation('name', 'ar');
                $insert_customers->driver_name_en = $driver->getTranslation('name', 'en');
            }
    
            // Save the customer
            $insert_customers->save();
    
            // Redirect with success message
            toastr()->success(trans('messages.success'));
            return redirect()->route('Customers.index');
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
    public function update(StoreCustomers $request)
    {
        try {
            // Validate the request
            $validated = $request->validated();
    
            // Find the customer to update
            $update_customer = CustomersModel::findOrFail($request->id); 
    
            // Update the customer with new values
            $update_customer->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'phone' => $request->phone,
                'town_id' => $request->town_id,
                'district_id' => $request->district_id,
                'driver_id' => $request->driver_id,
            ]); 
    
            // Load all towns, districts, and drivers
            $towns = TownsModel::all();
            $districts = DistrictsModel::all();
            $drivers = DriversModel::all();
    
            // Find associated town, district, and driver
            $town = $towns->find($request->town_id);
            $district = $districts->find($request->district_id);
            $driver = $drivers->find($request->driver_id);
    
            // If town, district, and driver are found, set their translations
            if ($town) {
                $update_customer->town_name_ar = $town->getTranslation('name', 'ar');
                $update_customer->town_name_en = $town->getTranslation('name', 'en');
            }
    
            if ($district) {
                $update_customer->district_name_ar = $district->getTranslation('name', 'ar');
                $update_customer->district_name_en = $district->getTranslation('name', 'en');
            }
    
            if ($driver) {
                $update_customer->driver_name_ar = $driver->getTranslation('name', 'ar');
                $update_customer->driver_name_en = $driver->getTranslation('name', 'en');
            }
    
            // Save the updated customer
            $update_customer->save();
    
            // Redirect with success message
            toastr()->info(trans('messages.update'));
            return redirect()->route('Customers.index');
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
        CustomersModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Customers.index');
    }




    public function getdistrict($id)
    {
        $list_districts = DistrictsModel::where("town_id", $id)->pluck("name", "id");
        return $list_districts;
    }




    // API
    public function viewCustomers() 
    {
        $customers = CustomersModel::all();
        
        if($customers)    {
                
            return response()->json([
                'status' => 'success',
                'data' => $customers,
            ]);
        
        }else{
            return response()->json([
                'status' => 'failure',
                'data' => 'null',
            ]);

        }
    }



}
