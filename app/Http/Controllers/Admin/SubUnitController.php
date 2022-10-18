<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\SubUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubUnitController extends Controller
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
        $units = IteUnit::get();
        $subUnits = SubUnit::get();
        return view('admin.pages.subUnit.create' , compact('subUnits','items','units'));
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
        SubUnit::create([
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'sub_unit' =>$request->sub_unit,
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
        $items = IteItem::get();
        $units = IteUnit::get();
        $subUnits = SubUnit::findOrFail($id);
        return view('admin.pages.subUnit.edit' , compact('subUnits','items','units'));
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
        $subUnits = SubUnit::findOrFail($id);
        $subUnits->update([
            'item_id' =>$request->item_id,
            'unit_id' =>$request->unit_id,
            'sub_unit' =>$request->sub_unit,
            'quantity' =>$request->quantity,
        ]);
        return redirect()->route('subunit.create')->with(['success' => " تم  بنجاح"]);
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
        $subUnits = SubUnit::findOrFail($id);
        $subUnits->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
