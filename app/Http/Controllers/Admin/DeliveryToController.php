<?php

namespace App\Http\Controllers\Admin;

use App\Models\Engineer;
use App\Models\DeliveryTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryToController extends Controller
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
        $deliveries = DeliveryTo::get();
        return view('admin.pages.deliveryTo.create', compact('deliveries' , 'engineers'));
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
        DeliveryTo::create([
            'engineer_id' =>$request->engineer_id,
            'date' =>$request->date,
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
        $deliveries = DeliveryTo::findOrFail($id);
        return view('admin.pages.deliveryTo.edit', compact('deliveries' , 'engineers'));
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
        $deliveries = DeliveryTo::findOrFail($id);
        $deliveries->update([
            'engineer_id' =>$request->engineer_id,
            'date' =>$request->date,
        ]);
        return redirect()->route('deliveryTo.create')->with(['success' => " تم  بنجاح"]);
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
        $deliveries = DeliveryTo::findOrFail($id);
        $deliveries->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
