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
        $List_Districts = $request->List_Districts;

        try {

            $validated = $request->validated();
           foreach ($List_Districts as $List_Districts) {

               $insert_districts = new DistrictsModel();
               $insert_districts->name = ['en' => $List_Districts['name_en'], 'ar' => $List_Districts['name_ar']];
               $insert_districts->town_id = $List_Districts['town'];

               $insert_districts->save();

           }

            toastr()->success(trans('messages.success'));
           return redirect()->route('Districts.index');
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
    public function update(StoreDistricts $request)
{
    try {
        $validated = $request->validated();

        $update_district = DistrictsModel::findOrFail($request->id); 
        $update_district->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'town_id' => $request->town,
        ]); 

        toastr()->info(trans('messages.update'));
        return redirect()->route('Districts.index');
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
        DistrictsModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Districts.index');
    }



 
}
