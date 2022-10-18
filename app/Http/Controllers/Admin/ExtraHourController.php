<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExtraHour;
use App\Models\StaffData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExtraHourController extends Controller
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
        $extars = ExtraHour::get();
        return view('admin.pages.extra.create' , compact('extars' , 'staffs'));
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
        ExtraHour::create([
            'staff_id' => $request->staff_id,
            'hours' => $request->hours,
            'mints' => $request->mints,
            'date' => $request->date,
            'notes' => $request->notes,
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
        $extars = ExtraHour::findOrFail($id);
        return view('admin.pages.extra.edit' , compact('extars' , 'staffs'));
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
        $extars = ExtraHour::findOrFail($id);
        $extars->update([
            'staff_id' => $request->staff_id,
            'hours' => $request->hours,
            'mints' => $request->mints,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);
        return redirect()->route('extraHours.create')->with(['success' => " تم  بنجاح"]);
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
        $extars = ExtraHour::findOrFail($id);
        $extars->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
