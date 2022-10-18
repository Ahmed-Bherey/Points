<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Supplier;
use App\Models\Treasury;
use App\Models\BounceNoBill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BounceNoBillController extends Controller
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
        $units = IteUnit::get();
        $stores = StStore::get();
        $treasuries = Treasury::get();
        $bounceNoBills = BounceNoBill::get();
        return view('admin.pages.bounceNoBill.create', compact('bounceNoBills' , 'suppliers' , 'items' , 'units' , 'stores' , 'treasuries'));
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
        BounceNoBill::create([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'last_balance' => $request->last_balance,
            'receipt_num' => $request->receipt_num,
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'discount_value' => $request->discount_value,
            'discount_rate' => $request->discount_rate,
            'total_item_price' => $request->total_item_price,
            'tax_added_value' => $request->tax_added_value,
            'tax_added_rate' => $request->tax_added_rate,
            'total_return' => $request->total_return,
            'paid' => $request->paid,
            'rest' => $request->rest,
            'treasury_id' => $request->treasury_id,
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
        $units = IteUnit::get();
        $stores = StStore::get();
        $treasuries = Treasury::get();
        $bounceNoBills = BounceNoBill::findOrFail($id);
        return view('admin.pages.bounceNoBill.edit', compact('bounceNoBills' , 'suppliers' , 'items' , 'units' , 'stores' , 'treasuries'));
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
        $bounceNoBills = BounceNoBill::findOrFail($id);
        $bounceNoBills->update([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'last_balance' => $request->last_balance,
            'receipt_num' => $request->receipt_num,
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'discount_value' => $request->discount_value,
            'discount_rate' => $request->discount_rate,
            'total_item_price' => $request->total_item_price,
            'tax_added_value' => $request->tax_added_value,
            'tax_added_rate' => $request->tax_added_rate,
            'total_return' => $request->total_return,
            'paid' => $request->paid,
            'rest' => $request->rest,
            'treasury_id' => $request->treasury_id,
        ]);
        return redirect()->route('bounceNoBill.create')->with(['success' => " تم  بنجاح"]);
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
        $bounceNoBills = BounceNoBill::findOrFail($id);
        $bounceNoBills->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }

    public function treasuryAjax($id){
        $treasuryValue = Treasury::where('id',$id)->value('treasury_value');
        return json_encode($treasuryValue);
    }
}
