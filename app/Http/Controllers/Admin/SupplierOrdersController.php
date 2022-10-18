<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\SupplierOrders;
use App\Http\Controllers\Controller;

class SupplierOrdersController extends Controller
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
        $supplies = Supplier::get();
        $items = IteItem::get();
        $supplierOrders = SupplierOrders::get();
        return view('admin.pages.SupplierOrders.create' , compact('supplierOrders' , 'supplies' , 'items'));
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
        SupplierOrders::create([
            'order_number' =>$request->order_number,
            'suppler_id' =>$request->suppler_id,
            'date' =>$request->date,
            'item_id' =>$request->item_id,
            'unit_price' =>$request->unit_price,
            'quantity' =>$request->quantity,
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
        $supplies = Supplier::get();
        $items = IteItem::get();
        $supplierOrders = SupplierOrders::findOrFail($id);
        return view('admin.pages.SupplierOrders.edit' , compact('supplierOrders' , 'supplies' , 'items'));
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
        $supplierOrders = SupplierOrders::findOrFail($id);
        $supplierOrders->update([
            'order_number' =>$request->order_number,
            'suppler_id' =>$request->suppler_id,
            'date' =>$request->date,
            'item_id' =>$request->item_id,
            'unit_price' =>$request->unit_price,
            'quantity' =>$request->quantity,
        ]);
        return redirect()->route('supplierOrders.create')->with(['success' => " تم  بنجاح"]);
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
        $supplierOrders = SupplierOrders::findOrFail($id);
        $supplierOrders->delete();
        return redirect()->back()->with(['error' => " تم  بنجاح"]);
    }
}
