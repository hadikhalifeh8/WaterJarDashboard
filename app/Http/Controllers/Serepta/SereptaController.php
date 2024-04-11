<?php

namespace App\Http\Controllers\Serepta;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSerepta;
use App\Models\SereptaModel;
use Illuminate\Http\Request;

class SereptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serepta = SereptaModel::all();
        return view('pages.Serepta.serepta', compact('serepta'));
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
    public function store(StoreSerepta $request)
    {
        $List_Serepta = $request->List_Serepta;

        try {

            $validated = $request->validated();
           foreach ($List_Serepta as $List_Serepta) {

               $insert_districts = new SereptaModel();
               $insert_districts->name = ['en' => $List_Serepta['name_en'], 'ar' => $List_Serepta['name_ar']];
               $insert_districts->price_Lira = $List_Serepta['price_Lira'];
               $insert_districts->price_Dollar = $List_Serepta['price_Dollar'];


               $insert_districts->save();

           }

            toastr()->success(trans('messages.success'));
           return redirect()->route('Serepta.index');
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
    public function update(StoreSerepta $request)
    {
        try {
            $validated = $request->validated();
    
            $update_serepta = SereptaModel::findOrFail($request->id); 
            $update_serepta->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'price_Lira' => $request->price_Lira,
                'price_Dollar' => $request->price_Dollar,

            ]); 
    
            toastr()->info(trans('messages.update'));
            return redirect()->route('Serepta.index');
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
        SereptaModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Serepta.index');
    }
}
