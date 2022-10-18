<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\MaintenanceWorthy;
use App\Http\Controllers\Controller;

class MaintenanceWorthyController extends Controller
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
        $maintenances = MaintenanceWorthy::get();
        return view('admin.pages.maintenanceWorthy.create' , compact('maintenances' , 'clients'));
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
        MaintenanceWorthy::create([
            'client_id' =>$request->client_id,
            'city' =>$request->city,
            'date_from' =>$request->date_from,
            'device_name' =>$request->device_name,
            'covernorate' =>$request->covernorate,
            'date_to' =>$request->date_to,
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
        $maintenances = MaintenanceWorthy::findOrFail($id);
        return view('admin.pages.maintenanceWorthy.edit' , compact('maintenances' , 'clients'));
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
        $maintenances = MaintenanceWorthy::findOrFail($id);
        $maintenances->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('maintenanceWorthy.create')->with(['success' => " تم  بنجاح"]);
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
        $maintenances = MaintenanceWorthy::findOrFail($id);
        $maintenances->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
