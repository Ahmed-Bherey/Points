<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absence;
use App\Models\StaffData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
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
        $absences = Absence::get();
        return view('admin.pages.absence.create' , compact('absences' , 'staffs'));
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
        Absence::create([
            'staff_id' => $request->staff_id,
            'days' => $request->days,
            'holidy_id' => $request->holidy_id,
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
        $absences = Absence::findOrFail($id);
        return view('admin.pages.absence.edit' , compact('absences' , 'staffs'));
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
        $absences = Absence::findOrFail($id);
        $absences->update([
            'staff_id' => $request->staff_id,
            'days' => $request->days,
            'holidy_id' => $request->holidy_id,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);
        return redirect()->route('absence.create')->with(['success' => " تم  بنجاح"]);
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
        $absences = Absence::findOrFail($id);
        $absences->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
