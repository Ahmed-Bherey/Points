<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaffData;
use Illuminate\Http\Request;

class StaffDataController extends Controller
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
        $staffs = StaffData::get();
        return view('admin.pages.staffData.create', compact('staffs'));
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
        StaffData::create([
            'name' =>$request->name,
            'address' =>$request->address,
            'salary' =>$request->salary,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
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
        $staffs = StaffData::findOrFail($id);
        return view('admin.pages.staffData.edit', compact('staffs'));
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
        $staffs = StaffData::findOrFail($id);
        $staffs->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'salary' =>$request->salary,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('staffData.create')->with(['success' => " تم  بنجاح"]);
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
        $staffs = StaffData::findOrFail($id);
        $staffs->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
