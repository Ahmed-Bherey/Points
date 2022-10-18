<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technician;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicianController extends Controller
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
        $technicians = Technician::get();
        return view('admin.pages.technicians.create' , compact('technicians'));
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
        Technician::create([
            'name' =>$request->name,
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
        $technicians = Technician::findOrFail($id);
        return view('admin.pages.technicians.edit' , compact('technicians'));
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
        $technicians = Technician::findOrFail($id);
        $technicians->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('technicians.create')->with(['success' => " تم  بنجاح"]);
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
        $technicians = Technician::findOrFail($id);
        $technicians->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
