<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Technician;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConverterMaintenance;

class ConverterMaintenanceController extends Controller
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
        $clients = Client::get();
        $technicians = Technician::get();
        $converters = ConverterMaintenance::get();
        return view('admin.pages.converterMaintenance.create' , compact('converters' , 'clients' , 'technicians'));
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
        ConverterMaintenance::create([
            'client_id' =>$request->client_id,
            'technician_id' =>$request->technician_id,
            'device_name' =>$request->device_name,
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
        $clients = Client::get();
        $technicians = Technician::get();
        $converters = ConverterMaintenance::findOrFail($id);
        return view('admin.pages.converterMaintenance.edit' , compact('converters' , 'clients' , 'technicians'));
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
        $converters = ConverterMaintenance::findOrFail($id);
        $converters->update([
            'client_id' =>$request->client_id,
            'technician_id' =>$request->technician_id,
            'device_name' =>$request->device_name,
        ]);
        return redirect()->route('converterMaintenance.create')->with(['success' => " تم  بنجاح"]);
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
        $converters = ConverterMaintenance::findOrFail($id);
        $converters->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
