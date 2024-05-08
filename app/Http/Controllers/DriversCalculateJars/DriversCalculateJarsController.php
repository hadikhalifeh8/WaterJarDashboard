<?php

namespace App\Http\Controllers\DriversCalculateJars;

use App\Http\Controllers\Controller;
use App\Models\CustomersModel;
use App\Models\DriversModel;
use App\Models\OrdersModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DriversCalculateJarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = DriversModel::all();
        // $orders = OrdersModel::distinct()->get(['driver_name']);
        $orders = OrdersModel::all();

        return view("pages.DriversCalcalateJarsOrders.driversCalcalateJarsOrders", compact('orders', 'drivers'));
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    

    public function getJarsLoad($id){
        $totalJars_ = OrdersModel::where("driver_id", $id)->distinct()->pluck( "totalJars");
        return $totalJars_ ;
     
    }


    // public function getJarsIn($id) {
    //     $qtyJarIn = OrdersModel::where("driver_id", $id)->pluck("qty_jar_in");
    //     return $qtyJarIn;
    // }
    // public function getJarsIn($id) {
    //   //  $today = Carbon::today(); // Get the current date/time
    //     $today = date("Y-m-d H:i:s");
    
    //     // Retrieve the sum of qty_jar_in for orders by the specified driver and created or updated today
    //     $sumQtyJarIn = OrdersModel::where('driver_id', $id)
    //     ->where('created_at', $today) // Filter by created_at matching today
    //     ->orWhere('updated_at', $today) // Or filter by updated_at matching today
           
    //         ->sum('qty_jar_in');
    
    //     return $sumQtyJarIn;
    // }


    public function getJarsIn($id) {
        $today = Carbon::today(); // Get the current date/time
    
        // Retrieve the sum of qty_jar_in for orders by the specified driver and created or updated today
        $sumQtyJarOut = OrdersModel::where('driver_id', $id)
            ->where(function ($query) use ($today) {
                // Filter by orders created or updated today
                $query->whereDate('created_at', $today)
                      ->orWhereDate('updated_at', $today);
            })
            ->sum('qty_jar_in');
    
        return $sumQtyJarOut;
    }


    // public function getJarsOut($id) {
    //     $qtyJarOut = OrdersModel::where("driver_id", $id)->pluck("qty_jar_out");
    //     return $qtyJarOut;
    // }


    public function getJarsOut($id) {
        $today = Carbon::today(); // Get the current date/time
    
        // Retrieve the sum of qty_jar_in for orders by the specified driver and created or updated today
        $sumQtyJarOut = OrdersModel::where('driver_id', $id)
            ->where(function ($query) use ($today) {
                // Filter by orders created or updated today
                $query->whereDate('created_at', $today)
                      ->orWhereDate('updated_at', $today);
            })
            ->sum('qty_jar_out');
    
        return $sumQtyJarOut;
    }


    
    // public function getSumQtyOfJarsFillsReurned($id) {
    //     $qtyJarOut = OrdersModel::where("driver_id", $id)->pluck("qty_jar_out");
    //     return $qtyJarOut;
    // }

    public function getSumQtyOfJarsFillsReturned($id) {
        $today = Carbon::today()->toDateString(); // Get today's date in 'Y-m-d' format
    
        // Retrieve distinct totalJars values for orders created or updated today
        $distinctTotalJarsToday = OrdersModel::select('totalJars')
            ->where('driver_id', $id)
            ->where(function ($query) use ($today) {
                $query->whereDate('created_at', $today)
                      ->orWhereDate('updated_at', $today);
            })
            ->distinct()
            ->get(); // Retrieve distinct totalJars values
    
        $qtyJarsReturnedFill = 0;
    
        // Loop through each distinct totalJars value
        foreach ($distinctTotalJarsToday as $order) {
            $totalJars = $order->totalJars;
    
            // Sum qty_jar_in for orders with the current totalJars value
            $qtyJarIn = OrdersModel::where('driver_id', $id)
                ->where(function ($query) use ($today) {
                    $query->whereDate('created_at', $today)
                          ->orWhereDate('updated_at', $today);
                })
                ->where('totalJars', $totalJars)
                ->sum('qty_jar_in');
    
            // Calculate the difference: totalJars - qty_jar_in
            $qtyJarsReturnedFill += ($totalJars - $qtyJarIn);
        }
    
        return $qtyJarsReturnedFill;
    }






 


}
