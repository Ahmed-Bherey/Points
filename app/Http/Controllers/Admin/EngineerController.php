<?php

namespace App\Http\Controllers\Admin;

use App\Models\StStore;
use App\Models\Engineer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stores = StStore::get();
        $engineers = Engineer::get();
        return view('admin.pages.engineers.create', compact('engineers' , 'stores'));
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
        Engineer::create([
            'name' =>$request->name,
            'address'=>$request->address,
            'store_id'=>$request->store_id,
            'tel'=>$request->tel,
            'rate'=>$request->rate,
            'notes'=>$request->notes,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
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
        $stores = StStore::get();
        $engineers = Engineer::findOrFail($id);
        return view('admin.pages.engineers.edit', compact('engineers' , 'stores'));
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
        $engineers = Engineer::findOrFail($id);
        $engineers->update([
            'name' =>$request->name,
            'address'=>$request->address,
            'store_id'=>$request->store_id,
            'tel'=>$request->tel,
            'rate'=>$request->rate,
            'notes'=>$request->notes,
        ]);
        return redirect()->route('engineer.create')->with(['success' => " تم  بنجاح"]);
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
        $engineers = Engineer::findOrFail($id);
        $engineers->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
