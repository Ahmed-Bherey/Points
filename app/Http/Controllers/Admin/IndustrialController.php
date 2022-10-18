<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industrial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustrialController extends Controller
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
        $industrials = Industrial::get();
        return view('admin.pages.industrial.create' , compact('industrials'));
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
        Industrial::create([
            'name' =>$request->name,
            'industrial_tel' =>$request->industrial_tel,
            'fax' =>$request->fax,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
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
        $industrials = Industrial::findOrFail($id);
        return view('admin.pages.industrial.edit' , compact('industrials'));
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
        $industrials = Industrial::findOrFail($id);
        $industrials->update([
            'name' =>$request->name,
            'industrial_tel' =>$request->industrial_tel,
            'fax' =>$request->fax,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('industrial.create')->with(['success' => " تم  بنجاح"]);
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
        $industrials = Industrial::findOrFail($id);
        $industrials->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
