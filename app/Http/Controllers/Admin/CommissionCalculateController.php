<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\StaffData;
use Illuminate\Http\Request;
use App\Models\CommissionCalculate;
use App\Http\Controllers\Controller;

class CommissionCalculateController extends Controller
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
        $staffs = StaffData::get();
        $calculates = CommissionCalculate::get();
        return view('admin.pages.commissionCalculate.create', compact('calculates' , 'staffs' , 'items'));
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
        CommissionCalculate::create([
            'item_id' =>$request->item_id,
            'employee_id' =>$request->employee_id,
            'commission' =>$request->commission,
            'date' =>$request->date,
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
        $staffs = StaffData::get();
        $calculates = CommissionCalculate::findOrFail($id);
        return view('admin.pages.commissionCalculate.edit', compact('calculates' , 'staffs' , 'items'));
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
        $calculates = CommissionCalculate::findOrFail($id);
        $calculates->update([
            'item_id' =>$request->item_id,
            'employee_id' =>$request->employee_id,
            'commission' =>$request->commission,
            'date' =>$request->date,
            'quantity' =>$request->quantity,
        ]);
        return redirect()->route('commissionCalculate.create')->with(['success' => " تم  بنجاح"]);
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
        $calculates = CommissionCalculate::findOrFail($id);
        $calculates->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
