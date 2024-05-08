<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrivers;
use App\Models\CustomerOrdersModel;
use App\Models\CustomersModel;
use App\Models\DriversModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = DriversModel::all();
        $customers = CustomersModel::all();
        return view('pages.Drivers.drivers', compact('drivers', 'customers'));
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
    public function store(StoreDrivers $request)
    {
        // return $request;

        try {
           
            $validated = $request->validated();
            

               $insert_drivers = new DriversModel();
               $insert_drivers->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
               $insert_drivers->phone = $request->phone;
            //    $insert_drivers->password = bcrypt($request['password']);
            $insert_drivers->password = $request->password;
            $insert_drivers->totalJars = $request->totalJars;


             //  $insert_drivers->customer_id	 = $request->customer_id;

               $insert_drivers->save();

           

            toastr()->success(trans('messages.success'));
           return redirect()->route('Drivers.index');
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
    // public function update(StoreDrivers $request)
    // {
    //     try {
    //         $validated = $request->validated();
    
    //         $update_drivers = DriversModel::findOrFail($request->id); 
    //         $update_drivers->update([
    //             'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
    //             'phone' => $request->phone,
    //             'password' => $request->password,
    //             'totalJars' => $request->totalJars,

    //        //     'customer_id' => $request->customer_id,

    //         ]); 
    
    //         toastr()->info(trans('messages.update'));
    //         return redirect()->route('Drivers.index');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }


    public function update(StoreDrivers $request)
{
    try {
        $validated = $request->validated();
        
        $update_driver = DriversModel::findOrFail($request->id);
        $update_driver->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'phone' => $request->phone,
            'password' => $request->password,
            'totalJars' => $request->totalJars,
        ]);

        //  update totalJars in  customer CustomerOrders orders
        $customerOrders = CustomerOrdersModel::where('driver_id', $update_driver->id)->get();
        
        foreach ($customerOrders as $order) {

            $order->totalJars = $update_driver->totalJars;
            $order->save();
        }

        toastr()->info(trans('messages.update'));
        return redirect()->route('Drivers.index');
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
        DriversModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Drivers.index');
    }


   //////////////////////////////////   API   /////////////////////////////////////////////// 
    public function viewDrivers()
    {
        $drivers = DriversModel::all();
        
         if($drivers)    {
                 
             return response()->json([
                 'status' => 'success',
                 'data' => $drivers,
             ]);
         
         }else{
             return response()->json([
                 'status' => 'failure',
                 'data' => 'null',
             ]);
 
         }
    }




    // Insert Or Update Driver Orders sync Data:
    public function insertDriverOrders(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required',
            'driver_name' => 'required',

            'customer_id' => 'required',
            'customer_name' => 'required',

            'town_id' => 'required',
            'town_name' => 'required',

            'district_id' => 'required',
            'district_name' => 'required',

            'serepta_id' => 'required',
            'serepta_name' => 'required',

            'srpta_price_Lira' => 'required',

            'qty_jar_in' => 'required',
            'qty_jar_out' => 'required',
            'qty_previous_jars' => 'required',
            'total_jar' => 'required',

            // 'price_per_jar' => 'required',
            'total_price_jars' => 'required',

            'old_debt' => 'required',
            'new_debt' => 'required',

            'paid' => 'required',
            'total_price' => 'required',



        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
    
             

         
        // Create a new order
        
  
          // Update or set values based on the request
          $orders = OrdersModel::updateOrCreate([

                    'id' => $request->id,
          ]
          
          ,[

           'driver_id' => $request->driver_id,
            'driver_name' => $request->driver_name,

            'customer_id' => $request->customer_id,
            'customer_name' => $request->customer_name,

            'town_id' => $request->town_id,
            'town_name' => $request->town_name,

            'district_id' => $request->district_id,
            'district_name' => $request->district_name,

            'serepta_id' => $request->serepta_id,
            'serepta_name' => $request->serepta_name,


            'srpta_price_Lira' => $request->srpta_price_Lira,

            'qty_jar_in' => $request->qty_jar_in,
            'qty_jar_out' => $request->qty_jar_out,
            'qty_previous_jars' => $request->qty_previous_jars,
            'total_jar' => $request->total_jar,
            // $orders->price_per_jar = $request->price_per_jar;
            'total_price_jars' => $request->total_price_jars,


            'old_debt' => $request->old_debt,
            'new_debt' => $request->new_debt,

            'paid' => $request->paid,
            'total_price' => $request->total_price,

          ]);
 
                   
            

                if($orders)    {
                
            return response()->json([
                'status' => 'success',
                'data' => $orders,
            ]);
        
        }else{
            return response()->json([
                'status' => 'failure',
                'data' => 'null',
            ]);

        }

    }

}
