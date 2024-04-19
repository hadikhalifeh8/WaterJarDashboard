<?php

namespace App\Http\Controllers\Districts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDistricts;
use App\Models\DistrictsModel;
use App\Models\TownsModel;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = DistrictsModel::all();
        $towns = TownsModel::all();
        return view('pages.Districts.districts', compact('districts', 'towns'));

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
    public function store(StoreDistricts $request)
    {
        // Load all towns
        $towns = TownsModel::all();
        
        // Get list of districts from the request
        $list_districts = $request->List_Districts;
    
        try {
            // Validate the request
            $validated = $request->validated();
    
            // Iterate over each district in the list
            foreach ($list_districts as $districtData) {
                // Create a new district instance
                $insert_districts = new DistrictsModel();
                
                // Set district name
                $insert_districts->name = [
                    'en' => $districtData['name_en'],
                    'ar' => $districtData['name_ar']
                ];
    
                // Set town ID for the district
                $insert_districts->town_id = $districtData['town'];
    
                // Find the associated town
                $town = $towns->find($districtData['town']);
    
                // If town is found, set its translations
                if ($town) {
                    $insert_districts->town_name_ar = $town->getTranslation('name', 'ar');
                    $insert_districts->town_name_en = $town->getTranslation('name', 'en');
                }
    
                // Save the district
                $insert_districts->save();
            }
    
            // Redirect with success message
            toastr()->success(trans('messages.success'));
            return redirect()->route('Districts.index');
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
    public function update(StoreDistricts $request)
    {
        try {
            // Validate the request
            $validated = $request->validated();
    
            // Find the district to update
            $update_district = DistrictsModel::findOrFail($request->id); 
    
            // Update the district with new values
            $update_district->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'town_id' => $request->town,
            ]); 
    
            // Find the associated town
            $town = TownsModel::find($request->town);
    
            // If town is found, set its translations
            if ($town) {
                $update_district->town_name_ar = $town->getTranslation('name', 'ar');
                $update_district->town_name_en = $town->getTranslation('name', 'en');
                $update_district->save();
            }
    
            // Redirect with success message
            toastr()->info(trans('messages.update'));
            return redirect()->route('Districts.index');
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
        DistrictsModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Districts.index');
    }


   // API
    public function viewDistricts()
    {
         $districts = DistrictsModel::all();
        
       // $districts = DistrictsModel::with('towns_rltn')->get();
        if($districts)    {
                
            return response()->json([
                'status' => 'success',
                'data' => $districts,
            ]);
        
        }else{
            return response()->json([
                'status' => 'failure',
                'data' => 'null',
            ]);

        }
    }



 
}


// "id" INTEGER,
// "name" TEXT,
// "town_id" INTEGER,
// "town_name_ar" TEXT,
// "town_name_en" TEXT,
// "created_at" TEXT,
// "updated_at" TEXT,