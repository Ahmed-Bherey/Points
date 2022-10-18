<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\StStore;
use Illuminate\Http\Request;
use App\Models\AddPermission;
use App\Models\TotalAddPermission;
use App\Http\Controllers\Controller;

class AddPermissionController extends Controller
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
        $addPermissions = AddPermission::get();
        $totals = TotalAddPermission::get();
        return view('admin.pages.addPermission.create' , compact('addPermissions' , 'totals' , 'stStores' , 'items'));
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
        $totals = TotalAddPermission::create([
            'date' =>$request->date,
            'store_id' =>$request->store_id,
            'notes' =>$request->notes,
        ]);

        foreach ($request->data["items_id"] as $key => $value)
        AddPermission::create([
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
        $totals = TotalAddPermission::findOrFail($id);
        $addPermissions = AddPermission::where('total_id',$id)->get();
        return view('admin.pages.addPermission.edit' , compact('addPermissions' , 'totals' , 'stStores' , 'items'));
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
        $totals = TotalAddPermission::findOrFail($id);
        AddPermission::where('total_id',$id)->delete();
        foreach ($request->data["items_id"] as $key => $value)
        AddPermission::create([
            'total_id' => $totals->id,
            'items_id' =>$value,
            'quantity' =>$request->data['quantity'][$key],
            'price' =>$request->data['price'][$key],
        ]);
        return redirect()->route('addPermission.create')->with(['success' => " تم  بنجاح"]);
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
        TotalAddPermission::where('id',$id)->delete();
        AddPermission::where('total_id',$id)->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
