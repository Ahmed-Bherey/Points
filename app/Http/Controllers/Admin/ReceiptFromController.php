<?php

namespace App\Http\Controllers\Admin;

use App\Models\ReceiptFrom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiptFromController extends Controller
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
        $receipts = ReceiptFrom::get();
        return view ('admin.pages.receiptFrom.create', compact('receipts'));
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
        ReceiptFrom::create([
            'name' =>$request->name,
            'result' =>$request->result,
            'date' =>$request->date,
            'tip' =>$request->tip,
            'cost' =>$request->cost,
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
        $receipts = ReceiptFrom::findOrFail($id);
        return view('admin.pages.receiptFrom.edit', compact('receipts'));
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
        $receipts = ReceiptFrom::findOrFail($id);
        $receipts->update([
            'name' =>$request->name,
            'result' =>$request->result,
            'date' =>$request->date,
            'tip' =>$request->tip,
            'cost' =>$request->cost,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('receiptFrom.create')->with(['success' => " تم  بنجاح"]);
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
        $receipts = ReceiptFrom::findOrFail($id);
        $receipts->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
