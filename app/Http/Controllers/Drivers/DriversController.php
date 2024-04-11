<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrivers;
use App\Models\CustomersModel;
use App\Models\DriversModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
               $insert_drivers->password = bcrypt($request['password']);
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
    public function update(StoreDrivers $request)
    {
        try {
            $validated = $request->validated();
    
            $update_drivers = DriversModel::findOrFail($request->id); 
            $update_drivers->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'phone' => $request->phone,
                'password' => $request->password,
           //     'customer_id' => $request->customer_id,

            ]); 
    
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

}
