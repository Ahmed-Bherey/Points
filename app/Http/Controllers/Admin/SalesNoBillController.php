<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Treasury;
use App\Models\SalesNoBill;
use App\Models\SalesReturn;
use Illuminate\Http\Request;
use App\Models\Representative;
use App\Http\Controllers\Controller;

class SalesNoBillController extends Controller
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
        $banks = Bank::get();
        $representatives = Representative::get();
        $customers = SalesReturn::get();
        $salesNoBill = SalesNoBill::get();
        return view('admin.pages.salesNoBill.create', compact('salesNoBill', 'items', 'unites', 'stores', 'treasuries', 'banks', 'representatives', 'customers'));
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
        SalesNoBill::create([
            'customer_id' => $request->customer_id,
            'date' => $request->date,
            'delegate_id' => $request->delegate_id,
            'last_balance' => $request->last_balance,
            'invoice_num' => $request->invoice_num,
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'code' => $request->code,
            'discount_value' => $request->discount_value,
            'discount_rate' => $request->discount_rate,
            'total_price' => $request->total_price,
            'added_tax_value' => $request->added_tax_value,
            'added_tax_rate' => $request->added_tax_rate,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'total_returned' => $request->total_returned,
            'paid' => $request->paid,
            'rest' => $request->rest,
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
        $banks = Bank::get();
        $representatives = Representative::get();
        $customers = SalesReturn::get();
        $salesNoBill = SalesNoBill::findOrFail($id);
        return view('admin.pages.salesNoBill.edit', compact('salesNoBill', 'items', 'unites', 'stores', 'treasuries', 'banks', 'representatives', 'customers'));
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
        $salesNoBill = SalesNoBill::findOrFail($id);
        $salesNoBill->update([
            'customer_id' => $request->customer_id,
            'date' => $request->date,
            'delegate_id' => $request->delegate_id,
            'last_balance' => $request->last_balance,
            'invoice_num' => $request->invoice_num,
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'code' => $request->code,
            'discount_value' => $request->discount_value,
            'discount_rate' => $request->discount_rate,
            'total_price' => $request->total_price,
            'added_tax_value' => $request->added_tax_value,
            'added_tax_rate' => $request->added_tax_rate,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'total_returned' => $request->total_returned,
            'paid' => $request->paid,
            'rest' => $request->rest,
        ]);
        return redirect()->route('salesNoBill.create')->with(['success' => " تم  بنجاح"]);
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
        $salesNoBill = SalesNoBill::findOrFail($id);
        $salesNoBill->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
