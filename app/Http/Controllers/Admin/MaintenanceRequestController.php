<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\IteItem;
use App\Models\StStore;
use App\Models\Engineer;
use Illuminate\Http\Request;
use App\Models\MaintenanceRequest;
use App\Http\Controllers\Controller;

class MaintenanceRequestController extends Controller
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
        $items = IteItem::get();
        $clients = Client::get();
        $stores = StStore::get();
        $engineers = Engineer::get();
        $maintenanceRequests = MaintenanceRequest::get();
        return view('admin.pages.MaintenanceReceipt.create', compact('maintenanceRequests','items','clients','stores','engineers'));
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
        MaintenanceRequest::create([
            'item_id' =>$request->item_id,
            'receipt_num' =>$request->receipt_num,
            'client_id' =>$request->client_id,
            'client_tel' =>$request->client_tel,
            'address' =>$request->address,
            'store_id' =>$request->store_id,
            'date_from' =>$request->date_from,
            'date_to' =>$request->date_to,
            'engineer_id' =>$request->engineer_id,
            'brand' =>$request->brand,
            'model' =>$request->model,
            'rapair_place' =>$request->rapair_place,
            'serial' =>$request->serial,
            'capacity' =>$request->capacity,
            'problem' =>$request->problem,
            'max_cost' =>$request->max_cost,
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
        $items = IteItem::get();
        $clients = Client::get();
        $stores = StStore::get();
        $engineers = Engineer::get();
        $maintenanceRequests = MaintenanceRequest::findOrFail($id);
        return view('admin.pages.MaintenanceReceipt.edit', compact('maintenanceRequests','items','clients','stores','engineers'));
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
        $maintenanceRequests = MaintenanceRequest::findOrFail($id);
        $maintenanceRequests->update([
            'item_id' =>$request->item_id,
            'receipt_num' =>$request->receipt_num,
            'client_id' =>$request->client_id,
            'client_tel' =>$request->client_tel,
            'address' =>$request->address,
            'store_id' =>$request->store_id,
            'date_from' =>$request->date_from,
            'date_to' =>$request->date_to,
            'engineer_id' =>$request->engineer_id,
            'brand' =>$request->brand,
            'model' =>$request->model,
            'rapair_place' =>$request->rapair_place,
            'serial' =>$request->serial,
            'capacity' =>$request->capacity,
            'problem' =>$request->problem,
            'max_cost' =>$request->max_cost,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('maintenanceRequest.create')->with(['success' => " تم  بنجاح"]);
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
        $maintenanceRequests = MaintenanceRequest::findOrFail($id);
        $maintenanceRequests->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
