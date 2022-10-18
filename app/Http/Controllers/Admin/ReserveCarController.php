<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\ReserveCar;
use Illuminate\Http\Request;
use App\Models\Representative;
use App\Http\Controllers\Controller;

class ReserveCarController extends Controller
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
        $storesFrom = StStore::get();
        $storesTo = StStore::get();
        $representatives = Representative::get();
        $items = IteItem::get();
        $units = IteUnit::get();
        $reserveCars = ReserveCar::get();
        return view('admin.pages.ReserveCar.create' , compact('reserveCars' ,'clients' , 'storesFrom' , 'storesTo' , 'representatives' , 'items' , 'units'));
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
        ReserveCar::create([
            'statement_num' =>$request->statement_num,
            'permission_type' =>$request->permission_type,
            'client_id' =>$request->client_id,
            'storeFrom_id' =>$request->storeFrom_id,
            'storeTo_id' =>$request->storeTo_id,
            'representative_id' =>$request->representative_id,
            'date' =>$request->date,
            'target' =>$request->target,
            'from' =>$request->from,
            'notes' =>$request->notes,
            'final_balance' =>$request->final_balance,
            'previous_balance' =>$request->previous_balance,
            'total_before_discount' =>$request->total_before_discount,
            'discount_value1' =>$request->discount_value1,
            'discount_rate1' =>$request->discount_rate1,
            'sales_tax' =>$request->sales_tax,
            'transportation_cost' =>$request->transportation_cost,
            'total_after_discount' =>$request->total_after_discount,
            'profit' =>$request->profit,
            'code' =>$request->code,
            'quantity' =>$request->quantity,
            'unit_price' =>$request->unit_price,
            'quantity_discount' =>$request->quantity_discount,
            'addition_rate' =>$request->addition_rate,
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'discount_value2' =>$request->discount_value2,
            'discount_rate2' =>$request->discount_rate2,
            'current_balance' =>$request->current_balance,
            'total_item_price' =>$request->total_item_price,
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
        $storesFrom = StStore::get();
        $storesTo = StStore::get();
        $representatives = Representative::get();
        $items = IteItem::get();
        $units = IteUnit::get();
        $reserveCars = ReserveCar::findOrFail($id);
        return view('admin.pages.ReserveCar.edit' , compact('reserveCars' ,'clients' , 'storesFrom' , 'storesTo' , 'representatives' , 'items' , 'units'));
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
        $reserveCars = ReserveCar::findOrFail($id);
        $reserveCars->update([
            'statement_num' =>$request->statement_num,
            'permission_type' =>$request->permission_type,
            'client_id' =>$request->client_id,
            'storeFrom_id' =>$request->storeFrom_id,
            'storeTo_id' =>$request->storeTo_id,
            'representative_id' =>$request->representative_id,
            'date' =>$request->date,
            'target' =>$request->target,
            'from' =>$request->from,
            'notes' =>$request->notes,
            'final_balance' =>$request->final_balance,
            'previous_balance' =>$request->previous_balance,
            'total_before_discount' =>$request->total_before_discount,
            'discount_value1' =>$request->discount_value1,
            'discount_rate1' =>$request->discount_rate1,
            'sales_tax' =>$request->sales_tax,
            'transportation_cost' =>$request->transportation_cost,
            'total_after_discount' =>$request->total_after_discount,
            'profit' =>$request->profit,
            'code' =>$request->code,
            'quantity' =>$request->quantity,
            'unit_price' =>$request->unit_price,
            'quantity_discount' =>$request->quantity_discount,
            'addition_rate' =>$request->addition_rate,
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'discount_value2' =>$request->discount_value2,
            'discount_rate2' =>$request->discount_rate2,
            'current_balance' =>$request->current_balance,
            'total_item_price' =>$request->total_item_price,
        ]);
        return redirect()->route('reserveCar.create')->with(['success' => " تم  بنجاح"]);
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
        $reserveCars = ReserveCar::findOrFail($id);
        $reserveCars->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
