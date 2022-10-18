<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Engineer;
use App\Models\MaintenanceDelivery;
use Illuminate\Http\Request;

class MaintenanceDeliveryController extends Controller
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
        $engineers = Engineer::get();
        $maintenances = MaintenanceDelivery::get();
        return view('admin.pages.maintenanceDelivery.create', compact('maintenances' , 'engineers'));
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
        MaintenanceDelivery::create([
            'engineer_id' =>$request->engineer_id,
            'result' =>$request->result,
            'date' =>$request->date,
            'notes' =>$request->notes,
            'maintenance_cost' =>$request->maintenance_cost,
            'price' =>$request->price,
            'total' =>$request->total,
            'pre_paid' =>$request->pre_paid,
            'net' =>$request->net,
            'paid' =>$request->paid,
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
        $engineers = Engineer::get();
        $maintenances = MaintenanceDelivery::findOrFail($id);
        return view('admin.pages.maintenanceDelivery.edit', compact('maintenances' , 'engineers'));
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
        $maintenances = MaintenanceDelivery::findOrFail($id);
        $maintenances->update([
            'engineer_id' =>$request->engineer_id,
            'result' =>$request->result,
            'date' =>$request->date,
            'notes' =>$request->notes,
            'maintenance_cost' =>$request->maintenance_cost,
            'price' =>$request->price,
            'total' =>$request->total,
            'pre_paid' =>$request->pre_paid,
            'net' =>$request->net,
            'paid' =>$request->paid,
        ]);
        return redirect()->route('maintenanceDelivery.create')->with(['success' => " تم  بنجاح"]);
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
        $maintenances = MaintenanceDelivery::findOrFail($id);
        $maintenances->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
