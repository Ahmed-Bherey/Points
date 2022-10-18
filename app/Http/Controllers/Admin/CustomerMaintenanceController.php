<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\CustomerMaintenance;
use App\Http\Controllers\Controller;

class CustomerMaintenanceController extends Controller
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
        $customers = CustomerMaintenance::get();
        return view('admin.pages.customerMaintenance.create' , compact('customers' , 'clients'));
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
        CustomerMaintenance::create([
            'client_id' =>$request->client_id,
            'dev_name' =>$request->dev_name,
            'date' =>$request->date,
            'status' =>$request->status,
            'hanger_num' =>$request->hanger_num,
            'mainten_status' =>$request->mainten_status,
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
        $customers = CustomerMaintenance::findOrFail($id);
        return view('admin.pages.customerMaintenance.edit' , compact('customers' , 'clients'));
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
        $customers = CustomerMaintenance::findOrFail($id);
        $customers->update([
            'client_id' =>$request->client_id,
            'dev_name' =>$request->dev_name,
            'date' =>$request->date,
            'status' =>$request->status,
            'hanger_num' =>$request->hanger_num,
            'mainten_status' =>$request->mainten_status,
        ]);
        return redirect()->route('customerMaintenance.create')->with(['success' => " تم  بنجاح"]);
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
        $customers = CustomerMaintenance::findOrFail($id);
        $customers->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
