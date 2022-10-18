<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use Illuminate\Http\Request;
use App\Models\EmployeeCommission;
use App\Http\Controllers\Controller;

class EmployeeCommissionController extends Controller
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
        $employeeCommissions = EmployeeCommission::get();
        return view('admin.pages.employeeCommission.create', compact('employeeCommissions' , 'items'));
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
        EmployeeCommission::create([
            'item_id' =>$request->item_id,
            'commission' =>$request->commission,
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
        $employeeCommissions = EmployeeCommission::findOrFail($id);
        return view('admin.pages.employeeCommission.edit', compact('employeeCommissions' , 'items'));
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
        $employeeCommissions = EmployeeCommission::findOrFail($id);
        $employeeCommissions->update([
            'item_id' =>$request->item_id,
            'commission' =>$request->commission,
        ]);
        return redirect()->route('employeeCommission.create')->with(['success' => " تم  بنجاح"]);
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
        $employeeCommissions = EmployeeCommission::findOrFail($id);
        $employeeCommissions->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
