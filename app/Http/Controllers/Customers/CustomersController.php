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
       //  return $request;
       try {
           
        $validated = $request->validated();
        

           $insert_customers = new CustomersModel();
           $insert_customers->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
           $insert_customers->phone = $request->phone;

           $insert_customers->town_id = $request->town_id;
           $insert_customers->district_id = $request->district_id;

           $insert_customers->driver_id = $request->driver_id;


        //    $insert_customers->tannouurine_id = $request->tannourine;
        //    $insert_customers->tann_price_Lira = $request->tann_price_Lira;
        //    $insert_customers->tann_price_Dollar = $request->tann_price_Dollar;


        //    $insert_customers->serepta_id = $request->serepta;
        //    $insert_customers->serep_price_Lira = $request->serep_price_Lira;
        //    $insert_customers->serep_price_Dollar = $request->serep_price_Dollar;

           $insert_customers->save();

       

        toastr()->success(trans('messages.success'));
       return redirect()->route('Customers.index');
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
    public function update(StoreCustomers $request)
    {
        try {
            $validated = $request->validated();
    
            $update_customer = CustomersModel::findOrFail($request->id); 
            $update_customer->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'phone' => $request->phone,
    
            'town_id' => $request->town_id,
            'district_id' => $request->district_id,
            'driver_id' => $request->driver_id,
    
            // 'tannouurine_id' => $request->tannourine,
            // 'tann_price_Lira' => $request->tann_price_Lira,
            // 'tann_price_Dollar' => $request->tann_price_Dollar,
    
            // 'serepta_id' => $request->serepta,
            // 'serep_price_Lira' => $request->serep_price_Lira,
            // 'serep_price_Dollar' => $request->serep_price_Dollar,
            
            ]); 
    
            toastr()->info(trans('messages.update'));
            return redirect()->route('Customers.index');
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
        CustomersModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Customers.index');
    }




    public function getdistrict($id)
    {
        $list_districts = DistrictsModel::where("town_id", $id)->pluck("name", "id");
        return $list_districts;
    }



}
