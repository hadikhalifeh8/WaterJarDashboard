<?php

namespace App\Http\Controllers\Tannourine;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTannourine;
use App\Models\TannourineModel;
use Illuminate\Http\Request;

class TannourineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tannourine = TannourineModel::all();
        return view('pages.Tannourine.tannourine', compact('tannourine'));
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
    public function store(StoreTannourine $request)
    {
        $List_Tannourine = $request->List_Tannourine;

        try {

            $validated = $request->validated();
           foreach ($List_Tannourine as $List_Tannourine) {

               $insert_tannourine = new TannourineModel();
               $insert_tannourine->name = ['en' => $List_Tannourine['name_en'], 'ar' => $List_Tannourine['name_ar']];
               $insert_tannourine->price_Lira = $List_Tannourine['price_Lira'];
               $insert_tannourine->price_Dollar = $List_Tannourine['price_Dollar'];


               $insert_tannourine->save();

           }

            toastr()->success(trans('messages.success'));
           return redirect()->route('Tannourine.index');
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
    public function update(StoreTannourine $request)
    {
        try {
            $validated = $request->validated();
    
            $update_serepta = TannourineModel::findOrFail($request->id); 
            $update_serepta->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'price_Lira' => $request->price_Lira,
                'price_Dollar' => $request->price_Dollar,

            ]); 
    
            toastr()->info(trans('messages.update'));
            return redirect()->route('Tannourine.index');
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
        TannourineModel::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Tannourine.index');
    }
}
