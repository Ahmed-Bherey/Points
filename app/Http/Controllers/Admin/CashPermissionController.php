<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\StStore;
use Illuminate\Http\Request;
use App\Models\LinlItemStore;
use App\Models\CashPermission;
use App\Models\TotalCashPermission;
use App\Http\Controllers\Controller;

class CashPermissionController extends Controller
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
        $stStores = StStore::get();
        $items = IteItem::get();
        $cashPermissions = CashPermission::get();
        $totals = TotalCashPermission::get();
        return view('admin.pages.CashPermission.create' , compact('cashPermissions' , 'totals' , 'stStores' , 'items'));
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
        $totals = TotalCashPermission::create([
            'date' =>$request->date,
            'store_id' =>$request->store_id,
            'notes' =>$request->notes,
        ]);

        foreach ($request->data["items_id"] as $key => $value)
        CashPermission::create([
            'total_id' => $totals->id,
            'items_id' =>$value,
            'quantity' =>$request->data['quantity'][$key],
            'price' =>$request->data['price'][$key],
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
        $stStores = StStore::get();
        $items = IteItem::get();
        $totals = TotalCashPermission::findOrFail($id);
        $cashPermissions = CashPermission::where('total_id',$id)->get();
        return view('admin.pages.CashPermission.edit' , compact('cashPermissions' , 'totals' , 'stStores' , 'items'));
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
        $totals = TotalCashPermission::findOrFail($id);
        CashPermission::where('total_id',$id)->delete();
        foreach ($request->data["items_id"] as $key => $value)
        CashPermission::create([
            'total_id' => $totals->id,
            'items_id' =>$value,
            'quantity' =>$request->data['quantity'][$key],
            'price' =>$request->data['price'][$key],
        ]);
        return redirect()->route('cashPermission.create')->with(['success' => " تم  بنجاح"]);
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
        TotalCashPermission::where('id',$id)->delete();
        CashPermission::where('total_id',$id)->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }

    public function cashPermissionAjax($id){
        $storeItem = LinlItemStore::where('store_id',$id)->with('items')->get();
        return json_encode($storeItem);
    }
}
