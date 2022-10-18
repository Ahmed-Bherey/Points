<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\ShowPrice;
use App\Models\SalesReturn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowPriceController extends Controller
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
        $customers = SalesReturn::get();
        $showPrices = ShowPrice::get();
        return view('admin.pages.showPrices.create' , compact('showPrices' ,'items' , 'unites' , 'customers'));
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
        ShowPrice::create([
            'show_prices_num' =>$request->show_prices_num,
            'show_prices_type' =>$request->show_prices_type,
            'customer_id' =>$request->customer_id,
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'code' =>$request->code,
            'quantity' =>$request->quantity,
            'notes' =>$request->notes,
            'unit_price' =>$request->unit_price,
            'dicount_value' =>$request->dicount_value,
            'dicount_rate' =>$request->dicount_rate,
            'total_item_price' =>$request->total_item_price,
            'total_items' =>$request->total_items,
            'added_tax_value' =>$request->added_tax_value,
            'added_tax_rate' =>$request->added_tax_rate,
            'profit' =>$request->profit,
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
        $customers = SalesReturn::get();
        $showPrices = ShowPrice::findOrFail($id);
        return view('admin.pages.showPrices.edit' , compact('showPrices' ,'items' , 'unites' , 'customers'));
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
        $showPrices = ShowPrice::findOrFail($id);
        $showPrices->update([
            'show_prices_num' =>$request->show_prices_num,
            'show_prices_type' =>$request->show_prices_type,
            'customer_id' =>$request->customer_id,
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'code' =>$request->code,
            'quantity' =>$request->quantity,
            'notes' =>$request->notes,
            'unit_price' =>$request->unit_price,
            'dicount_value' =>$request->dicount_value,
            'dicount_rate' =>$request->dicount_rate,
            'total_item_price' =>$request->total_item_price,
            'total_items' =>$request->total_items,
            'added_tax_value' =>$request->added_tax_value,
            'added_tax_rate' =>$request->added_tax_rate,
            'profit' =>$request->profit,
        ]);
        return redirect()->route('showPrice.create')->with(['success' => " تم  بنجاح"]);
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
        $showPrices = ShowPrice::findOrFail($id);
        $showPrices->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
