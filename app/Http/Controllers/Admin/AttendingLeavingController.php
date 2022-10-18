<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendingLeaving;
use App\Models\StaffData;
use Illuminate\Http\Request;

class AttendingLeavingController extends Controller
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
        $attendingLeavings = AttendingLeaving::get();
        return view('admin.pages.AttendingLeaving.edit', compact('attendingLeavings' , 'staffs'));
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
        AttendingLeaving::create([
            'staffData_id' =>$request->staffData_id,
            'type' =>$request->type,
            'date' =>$request->date,
            'attendance_time' =>$request->attendance_time,
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
        $staffs = StaffData::get();
        $attendingLeavings = AttendingLeaving::findOrFail($id);
        return view('admin.pages.AttendingLeaving.edit', compact('attendingLeavings' , 'staffs'));
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
        $attendingLeavings = AttendingLeaving::findOrFail($id);
        $attendingLeavings->update([
            'staffData_id' =>$request->staffData_id,
            'type' =>$request->type,
            'date' =>$request->date,
            'attendance_time' =>$request->attendance_time,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('attendingLeaving.create')->with(['success' => " تم  بنجاح"]);
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
        $attendingLeavings = AttendingLeaving::findOrFail($id);
        $attendingLeavings->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
