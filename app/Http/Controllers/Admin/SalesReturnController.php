<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Treasury;
use App\Models\SalesReturn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesReturnController extends Controller
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
        $unites = IteUnit::get();
        $stores = StStore::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $sales = SalesReturn::get();
        return view('admin.pages.salesReturns.create' , compact('sales' ,'items', 'unites' , 'stores' , 'treasuries' ,'banks'));
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
        SalesReturn::create([
            'invoice_num' =>$request->invoice_num,
            'name' =>$request->name,
            'delegate' =>$request->delegate,
            'date' =>$request->date,
            'last_balance' =>$request->last_balance,
            'total_before_discount' =>$request->total_before_discount,
            'discount_rate1' =>$request->discount_rate1,
            'discoun_value1' =>$request->discoun_value1,
            'added_tax_value' =>$request->v,
            'total_after_discount' =>$request->total_after_discount,
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'store_id' =>$request->store_id,
            'quantity' =>$request->quantity,
            'unit_price' =>$request->unit_price,
            'code' =>$request->code,
            'discoun_value2' =>$request->discoun_value2,
            'total_price' =>$request->total_price,
            'discount_rate2' =>$request->discount_rate2,
            'added_tax_rate' =>$request->added_tax_rate,
            'total_returned' =>$request->total_returned,
            'paid' =>$request->paid,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'rest' =>$request->rest,
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
        $unites = IteUnit::get();
        $stores = StStore::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $sales = SalesReturn::findOrFail($id);
        return view('admin.pages.salesReturns.edit' , compact('sales' ,'items', 'unites' , 'stores' , 'treasuries' ,'banks'));
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
        $sales = SalesReturn::findOrFail($id);
        $sales->update([
            'invoice_num' =>$request->invoice_num,
            'name' =>$request->name,
            'delegate' =>$request->delegate,
            'date' =>$request->date,
            'last_balance' =>$request->last_balance,
            'total_before_discount' =>$request->total_before_discount,
            'discount_rate1' =>$request->discount_rate1,
            'discoun_value1' =>$request->discoun_value1,
            'added_tax_value' =>$request->v,
            'total_after_discount' =>$request->total_after_discount,
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'store_id' =>$request->store_id,
            'quantity' =>$request->quantity,
            'unit_price' =>$request->unit_price,
            'code' =>$request->code,
            'discoun_value2' =>$request->discoun_value2,
            'total_price' =>$request->total_price,
            'discount_rate2' =>$request->discount_rate2,
            'added_tax_rate' =>$request->added_tax_rate,
            'total_returned' =>$request->total_returned,
            'paid' =>$request->paid,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'rest' =>$request->rest,
        ]);
        return redirect()->route('salesReturn.create')->with(['success' => " تم  بنجاح"]);
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
        $sales = SalesReturn::findOrFail($id);
        $sales->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
