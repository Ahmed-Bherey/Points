<?php

namespace App\Http\Controllers\Admin;

use App\Models\Serial;
use App\Models\IteItem;
use App\Models\StStore;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerialController extends Controller
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
        $suppliers = Supplier::get();
        $items = IteItem::get();
        $stores = StStore::get();
        $serials = Serial::get();
        return view('admin.pages.serialItem.create' , compact('suppliers', 'items','stores','serials'));
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
        Serial::create([
            'invoice_number' =>$request->invoice_number,
            'invoice_date' =>$request->invoice_date,
            'supplier_id' =>$request->supplier_id,
            'item_id' =>$request->item_id,
            'quantity' =>$request->quantity,
            'store_id' =>$request->store_id,
            'serial' =>$request->serial,
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
        $suppliers = Supplier::get();
        $items = IteItem::get();
        $stores = StStore::get();
        $serials = Serial::findOrFail($id);
        return view('admin.pages.serialItem.edit' , compact('suppliers', 'items','stores','serials'));
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
        $serials = Serial::findOrFail($id);
        $serials->update([
            'invoice_number' =>$request->invoice_number,
            'invoice_date' =>$request->invoice_date,
            'supplier_id' =>$request->supplier_id,
            'item_id' =>$request->item_id,
            'quantity' =>$request->quantity,
            'store_id' =>$request->store_id,
            'serial' =>$request->serial,
        ]);
        return redirect()->route('serial.create')->with(['success' => "تم  بنجاح"]);
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
        $serials = Serial::findOrFail($id);
        $serials->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
