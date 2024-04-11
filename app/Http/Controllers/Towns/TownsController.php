<?php

namespace App\Http\Controllers\Towns;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTowns;
use App\Models\TownsModel;
use Illuminate\Http\Request;

class TownsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = TownsModel::all();
        return view("pages.Towns.towns",  compact('towns'));
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
    public function store(StoreTowns $request)
    {

        $List_Towns = $request->List_Towns;

         try {

             $validated = $request->validated();
            foreach ($List_Towns as $List_Towns) {

                $insert_towns = new TownsModel();
                $insert_towns->name = ['en' => $List_Towns['name_en'], 'ar' => $List_Towns['name_ar']];


                $insert_towns->save();

            }

             toastr()->success(trans('messages.success'));
            return redirect()->route('Towns.index');
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
    public function update(StoreTowns $request)
    {
        try {

            $validated =  $request->validated();
           

               $update_towns = TownsModel::findOrfail($request->id); 
               $update_towns->update([
                $update_towns->name = ['en' => $request->name_en, 'ar' => $request->name_ar],
               ]); 
            
            toastr()->info(trans('messages.update'));
           return redirect()->route('Towns.index');
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

        TownsModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Towns.index');
    }




    
    public function viewTowns()
    {
        $towns = TownsModel::all();
       
        if($towns)    {
                
            return response()->json([
                'status' => 'success',
                'data' => $towns,
            ]);
        
        }else{
            return response()->json([
                'status' => 'failure',
                'data' => 'null',
            ]);

        }
    }
}
